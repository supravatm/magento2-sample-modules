<?php

namespace SMG\Blog\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory as ResultPageFactory;
use SMG\Blog\Model\PostRepository;
use Magento\Framework\Api\searchCriteriaBuilderFactory;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\Api\SortOrder;

class Getlist extends Action
{

    /**
     *
     * @var PageFactory
     */
    private $resultPageFactory;
    /**
     * @var
     */
    private $postFactory;
    /**
     * @var
     */
    private $postRepository;
    /**
     * @var
     */
    private $searchCriteriaBuilderFactory;
    /**
     * @var
     */
    private $sortOrderBuilder;


    public function __construct(
        Context $context,
        ResultPageFactory $resultPageFactory,
        PostRepository $postRepository,
        searchCriteriaBuilderFactory $searchCriteriaBuilderFactory,
        SortOrderBuilder $sortOrderBuilder
        
) {
        $this->resultPageFactory = $resultPageFactory;
        $this->postRepository = $postRepository;
        $this->searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
        $this->sortOrderBuilder = $sortOrderBuilder;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $searchCriteriaBuilder = $this->searchCriteriaBuilderFactory->create();
        $searchCriteria = $searchCriteriaBuilder->create();
        
        $sortOrder = $this->sortOrderBuilder
            ->setField('post_id')
            ->setDirection(SortOrder::SORT_DESC)
            ->create();
        $searchCriteriaBuilder->addSortOrder($sortOrder);
        $searchCriteria = $searchCriteriaBuilder->create();

        $list = $this->postRepository->getList($searchCriteria);
        $results = $list->getItems();
        echo '<pre>';
        foreach ($results as $result) {
            print_r($result->getData());
        }

        $this->resultFactory->create("raw");
    }
}
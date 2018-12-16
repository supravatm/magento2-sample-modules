<?php

namespace Stackexchange\CustomModule\Controller\Index;

use \Magento\Framework\Controller\Result\RawFactory;

class Getlist extends \Magento\Framework\App\Action\Action
{

    /**
     * Index resultPageFactory
     * @var PageFactory
     */
    private $resultPageFactory;
    /**
     * @var
     */
    private $modelFactory;
    /**
     * @var
     */
    private $modelRepository;
    /**
     * @var
     */
    private $searchCriteriaBuilder;


    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Custom\Module\Model\ModelRepository $modelRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Stackexchange\CustomModule\Model\ModelRepository $modelRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
) {
        $this->resultPageFactory = $resultPageFactory;
        $this->modelRepository = $modelRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
	die("eee");
        $_filter = $this->searchCriteriaBuilder
            ->addFilter("customer_name", "%na%", "like")->create();
        $list = $this->modelRepository->getList($_filter);
        $results = $list->getItems();
        foreach ($results as $result) {
            echo $result->getCustomerName() . "<br>";
        }




        $this->resultFactory->create("raw");
    }
}

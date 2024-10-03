<?php
namespace SMG\Blog\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use SMG\Blog\Model\PostRepository;

class GetById extends Action
{
    protected $postRepository;
    protected $_pageFactory;

    public function __construct(
        Context $context, 
        PageFactory $pageFactory,
        PostRepository $postRepository
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->postRepository = $postRepository;
        parent::__construct($context);
    }

    /**
     * Demostrate to save data using repository 
     */
    public function execute()
    {
        $searchData = $this->postRepository->getById(12);
        
        echo '<pre>';
        print_r($searchData->getData());

        $this->_pageFactory->create("raw");
    }
}
<?php

namespace SMG\Blog\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use SMG\Blog\Model\PostFactory;
use SMG\Blog\Model\PostRepository;

class Save extends Action
{
    protected $postFactory;
    protected $postRepository;
    protected $transactionFactory;
    protected $_pageFactory;

    public function __construct(
        Context $context, 
        PageFactory $pageFactory,
        PostFactory $postFactory,
        PostRepository $postRepository
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        /**
         * Demostrate to save data using repository 
         */
        $postItem = [
            'author' => "Bloger name goes here",
            'title' => "Post title goes here",
            'content' => "Post content goes here",
            'is_active' => 1,
            'store_id' => [1]
        ];
        $postFactory = $this->postFactory->create();
        $postFactory->addData($postItem);
        $this->postRepository->save($postFactory);
    
        $this->_pageFactory->create("raw");
    
    }
}
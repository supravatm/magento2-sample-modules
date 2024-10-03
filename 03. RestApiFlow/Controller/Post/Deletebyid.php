<?php
namespace SMG\Blog\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use SMG\Blog\Model\PostRepository;
use SMG\Blog\Model\PostFactory;

class Deletebyid extends Action
{
    protected $postRepository;
    protected $postFactory;
    protected $_pageFactory;

    public function __construct(
        Context $context, 
        PageFactory $pageFactory,
        PostFactory $postFactory,
        PostRepository $postRepository
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->postRepository = $postRepository;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    /**
     * Demostrate to save data using repository 
     */
    public function execute()
    {
        $post = $this->postFactory->create();
        $post->load(5);
        $searchData = $this->postRepository->delete($post);
        
        echo 'Post has been deleted';

        $this->_pageFactory->create("raw");
    }
}
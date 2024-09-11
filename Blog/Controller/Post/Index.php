<?php

namespace SMG\Blog\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

use SMG\Blog\Model\PostFactory;
use Magento\Framework\Db\TransactionFactory;
use SMG\Blog\Model\ResourceModel\Post\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use SMG\Blog\Model\PostRepository;
class Index extends Action
{
    protected $postCollection;
    protected $storeFactory;
    protected $postFactory;

    protected $postRepository;
    protected $transactionFactory;
    protected $_pageFactory;
    protected $storeManagerInterface;

    
    public function __construct(
        Context $context, 
        PageFactory $pageFactory,
        PostFactory $postFactory,
        PostRepository $postRepository,
        TransactionFactory $transactionFactory,
        StoreManagerInterface $storeManagerInterface,
        CollectionFactory $postCollection
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
        $this->transactionFactory = $transactionFactory;
        $this->postCollection = $postCollection;
        $this->storeManagerInterface = $storeManagerInterface;
        parent::__construct($context);
    }

    public function execute()
    {

        // $testBlock = [
        //     'title' => 'Test block title',
        //     'identifier' => 'test-block',
        //     'stores' => [0],
        //     'is_active' => 1,
        // ];
        // $this->blockFactory->create()->setData($testBlock)->save();
        echo '<pre>';

        $postItem = [
            'author' => "Blog Post Title 3",
            'title' => "Blog Post Title 3",
            'content' => "Blog Post Title 3",
            'is_active' => 1,
            'store_id' => 0
        ];
        $postFactory = $this->postFactory->create();
        $postFactory->addData($postItem);
        // $this->postRepository->save($postFactory);
        echo '************ID: '. $postFactory->getId() . '***************** <br/>';
        $collection = $this->postCollection->create();
        foreach($collection  as $post) 
        {
            echo '<pre>'; 
            //print_r($post->getData()); 
        }
        $search = $this->postRepository->getById(7);
       
        die("********** END Collection *******");

        return $this->_pageFactory->create();
    }
}
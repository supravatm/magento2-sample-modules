<?php

namespace Certification\ProductComment\Controller\Product;

use Magento\Framework\Controller\ResultFactory;

class Post extends \Magento\Framework\App\Action\Action
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

    protected $customerSession;
    protected $resultRedirect;


    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Certification\ProductComment\Model\ModelFactory $modelFactory
     * @param \Certification\ProductComment\Model\ModelRepository $modelRepository
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Certification\ProductComment\Model\ProductCommentFactory $productCommentFactory,
        \Certification\ProductComment\Model\ProductCommentRepository $productCommentRepository,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Controller\Result\Redirect $resultRedirect
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->productCommentFactory = $productCommentFactory;
        $this->productCommentRepository = $productCommentRepository;
        $this->resultRedirect = $resultRedirect;
        $this->_customerSession = $customerSession;
        return parent::__construct($context);


    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $data = $this->getRequest()->getPostValue();
        $productId = (int)$this->getRequest()->getParam('id');
        try {
        $data = [
            "product_id" => $productId,
            "customer_email" => $this->getRequest()->getPost('email'),
            "customer_comment" => $this->getRequest()->getPost('comment')
        ];

        if($this->_customerSession->isLoggedIn()){
            $data['customer_id'] =$this->_customerSession->getCustomer()->getId();
        } else {
            $data['customer_id'] = '';
        }

        $obj = $this->productCommentFactory->create();
        $this->productCommentRepository->save($obj->addData($data)); // Service Contract
            $this->messageManager->addSuccess(__('You submitted your comment for moderation.'));

        } catch (\Exception $e) {
            $this->messageManager->addError(__('We can\'t write your comment right now.'));
        }
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }

}

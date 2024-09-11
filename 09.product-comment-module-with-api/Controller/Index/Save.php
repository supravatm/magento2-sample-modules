<?php

namespace Certification\ProductComment\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
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
        \Magento\Customer\Model\Session $customerSession
) {
        $this->resultPageFactory = $resultPageFactory;
        $this->productCommentFactory = $productCommentFactory;
        $this->productCommentRepository = $productCommentRepository;
        $this->_customerSession = $customerSession;
        return parent::__construct($context);


    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {

        $data = [
            "product_id" => $this->getRequest()->getPost('product_id'),
            "customer_email" => $this->getRequest()->getPost('customer_email'),
            "customer_comment" => $this->getRequest()->getPost('customer_comment')
        ];
var_dump($data);
die;
        if($this->_customerSession->isLoggedIn()){
            $data['customer_id'] =$this->_customerSession->getCustomer()->getId();
        } else {
            $data['customer_id'] = null;
            $data['customer_guest'] = 2;
        }

        $obj = $this->productCommentFactory->create();
        $this->productCommentRepository->save($obj->addData($data)); // Service Contract
        //$obj->addData($data)->save(); // ProductComment / Resource ProductComment
        $this->resultFactory->create("raw");
    }

}

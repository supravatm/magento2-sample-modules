<?php

namespace Tutorial\Helloworld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;
 
    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute() {
        return $resultPage = $this->_resultPageFactory->create();
    }
}

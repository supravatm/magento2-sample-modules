<?php

namespace SMG\News\Controller\Adminhtml\News;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'SMG_News::manage';

    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $rawFactory
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory
    ) {
        $this->pageFactory = $rawFactory;

        parent::__construct($context);
    }

    /**
     * News
     *
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('SMG_News::manage');
        $resultPage->getConfig()->getTitle()->prepend(__('News Manager'));
        return $resultPage;
    }
}
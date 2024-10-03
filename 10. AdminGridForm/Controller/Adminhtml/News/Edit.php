<?php

namespace SMG\News\Controller\Adminhtml\News;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Registry;
use SMG\News\Model\NewsFactory;

class Edit extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'SMG_News::manage';

    /**
     * @var PageFactory
     */
    private $pageFactory;
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;
    /**
     * NewsFactory
     *
     * @var SMG\News\Model\NewsFactory
     */
    protected $newsFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $rawFactory
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory,
        Registry $coreRegistry,
        NewsFactory $newsFactory
    ) {
        $this->pageFactory = $rawFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->newsFactory = $newsFactory;
        parent::__construct($context);
    }

    /**
     * Add the main Admin Grid page
     *
     * @return Page
     */
    public function execute(): Page
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('news_id');
        $model = $this->newsFactory->create();

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This news no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('news_data', $model);

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit News') : __('New News'),
            $id ? __('Edit news') : __('New News')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('News'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New News'));
        return $resultPage;

    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('SMG_News::manage')
            ->addBreadcrumb(__('SMG'), __('SMG'))
            ->addBreadcrumb(__('SMG News'), __('SMG News'));
        return $resultPage;
    }
}
<?php

namespace Learning\FrontendCrud\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use \Learning\FrontendCrud\Model\ItemFactory;

    class Index extends Action
{
    public function __construct(Context $context, PageFactory $pageFactory, ItemFactory $itemFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}

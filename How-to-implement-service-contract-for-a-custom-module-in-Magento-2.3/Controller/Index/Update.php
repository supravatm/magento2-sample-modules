<?php

namespace Learning\FrontendCrud\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Learning\FrontendCrud\Model\Item;

class Update extends Action
{
    public function __construct(Context $context, PageFactory $pageFactory, Item $item)
    {
        $this->_pageFactory = $pageFactory;
        $this->item = $item;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}

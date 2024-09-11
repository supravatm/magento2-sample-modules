<?php

namespace Learning\FrontendCrud\Block\Index;

use Magento\Framework\View\Element\Template;
use \Learning\FrontendCrud\Model\Item;

class Form extends Template
{
    public function __construct(Template\Context $context, Item $item, array $data = [])
    {
        $this->_item = $item;
        parent::__construct($context, $data);
    }

    public function getFomActionUrl()
    {
        return $this->getUrl('crudfrontend/index/save', ['_secure' => true]);
    }

    public function getItem()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->_item->load($id);
        return $data;
    }
}

<?php

namespace Learning\FrontendCrud\Block\Index;

use Magento\Framework\View\Element\Template;
use \Learning\FrontendCrud\Model\ItemFactory;

class Grid extends Template
{
    public function __construct(Template\Context $context, ItemFactory $itemFactory, array $data = [])
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context, $data);
    }

    public function getFomActionUrl()
    {
        return $this->getUrl('crudfrontend/index/save', ['_secure' => true]);
    }
    public function getItems()
    {
        $item = $this->itemFactory->create();
        return $collection = $item->getCollection();
    }
}

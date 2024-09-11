<?php

namespace Learning\FrontendCrud\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'learning_frontend_crud_item_collection';
    protected $_eventObject = 'item_collection';

    protected function _construct()
    {
        $this->_init('Learning\FrontendCrud\Model\Item', 'Learning\FrontendCrud\Model\ResourceModel\Item');
    }
}

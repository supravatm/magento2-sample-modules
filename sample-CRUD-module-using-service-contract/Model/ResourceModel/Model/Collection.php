<?php

namespace Stackexchange\CustomModule\Model\ResourceModel\Model;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'ad_shipping_quote_collection';
    protected $_eventObject = 'quote_collection';

    protected function _construct()
    {
        $this->_init('Stackexchange\CustomModule\Model\Model', 'Stackexchange\CustomModule\Model\ResourceModel\Model');
    }
}

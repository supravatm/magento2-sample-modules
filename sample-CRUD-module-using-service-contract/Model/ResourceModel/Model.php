<?php

namespace Stackexchange\CustomModule\Model\ResourceModel;

class Model extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('ad_shipping_quote','entity_id');
    }
}

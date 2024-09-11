<?php

namespace Galaxy\CRUD\Model\ResourceModel;


class Item extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('tbl_crud_items', 'item_id');
    }
}
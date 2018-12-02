<?php
/**
 * Created by PhpStorm.
 * User: supravatm
 * Date: 1/12/18
 * Time: 11:12 PM
 */

namespace Galaxy\CRUD\Model\ResourceModel\Item;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'item_id';
    protected $_eventPrefix = 'galaxy_crud_item_collection';
    protected $_eventObject = 'item_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Galaxy\CRUD\Model\Item', 'Galaxy\CRUD\Model\ResourceModel\Item');
    }
}
<?php

namespace Certification\ProductComment\Model\ResourceModel\ProductComment;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'comment_id';

    protected function _construct()
    {
        $this->_init('Certification\ProductComment\Model\ProductComment', 'Certification\ProductComment\Model\ResourceModel\ProductComment');
    }
}

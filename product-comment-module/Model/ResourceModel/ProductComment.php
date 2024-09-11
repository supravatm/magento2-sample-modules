<?php

namespace Certification\ProductComment\Model\ResourceModel;

class ProductComment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'comment_id';

    protected function _construct()
    {
        $this->_init('product_comment','comment_id');
    }
}

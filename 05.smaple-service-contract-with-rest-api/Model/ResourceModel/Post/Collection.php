<?php

namespace SMG\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'smg_blog_post';
    protected $_eventObject = 'smg_blog_collection';

    protected function _construct()
    {
        $this->_init('SMG\Blog\Model\Post', 'SMG\Blog\Model\ResourceModel\Post');
    }
}
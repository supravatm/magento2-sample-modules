<?php

namespace SMG\News\Model\ResourceModel\News;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'news_id';

    protected function _construct()
    {
        $this->_init(\SMG\News\Model\News::class, \SMG\News\Model\ResourceModel\News::class);
    }
}
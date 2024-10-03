<?php

namespace SMG\News\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class News extends AbstractDb
{
    protected $_idFieldName = 'news_id';

    protected function _construct()
    {
        $this->_init('smg_news','news_id');
    }
}
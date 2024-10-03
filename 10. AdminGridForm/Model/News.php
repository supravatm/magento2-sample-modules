<?php
namespace SMG\News\Model;

use Magento\Framework\Model\AbstractModel;

class News extends AbstractModel
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'simple_news';

    protected function _construct()
    {
        $this->_init(ResourceModel\News::class);
    }
}
?>
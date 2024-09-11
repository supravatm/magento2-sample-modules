<?php
namespace SMG\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb; 

class Post extends AbstractDb
{
    protected $_idFieldName = 'post_id';
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('smg_blog_post', 'post_id');
    }
}
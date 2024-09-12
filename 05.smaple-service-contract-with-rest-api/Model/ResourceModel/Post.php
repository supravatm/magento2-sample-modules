<?php
namespace SMG\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb; 

class Post extends AbstractDb
{
    protected $_idFieldName = 'post_id';
    

    public function __construct(Context $context, $connectionName = null)
    {
        parent::__construct($context, $connectionName);
    }
    protected function _construct()
    {
        $this->_init('smg_blog_post', 'post_id');
    }


    public function deleteStores($postId)
    {
        $this->getConnection()->delete( $this->getTable('smg_blog_post_store'), ['post_id = ?' => $postId]);
        return $this;
    }

    public function saveRelationStore($postId, $stores) {
        
        $this->deleteStores($postId);
        foreach($stores as $store)
        {
            $this->getConnection()->insert( $this->getTable('smg_blog_post_store'), ['post_id' => $postId, 'store_id'=>$store ]);
        }
        
    }
}
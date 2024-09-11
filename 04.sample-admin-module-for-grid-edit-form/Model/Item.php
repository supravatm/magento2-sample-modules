<?php


namespace Galaxy\CRUD\Model;


class Item extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{

    /**#@+
     * Item's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    const CACHE_TAG = 'crud_post';

    protected $_cacheTag = 'crud_post';

    protected $_eventPrefix = 'crud_post';

    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Galaxy\CRUD\Model\ResourceModel\Item');
    }


    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    /**
     * Prepare post's statuses.
     * Available event blog_post_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}
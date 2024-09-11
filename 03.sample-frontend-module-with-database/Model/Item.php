<?php

namespace Learning\FrontendCrud\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'learning_frontend_crud_item';

    protected $_cacheTag = 'learning_frontend_crud_item';

    protected $_eventPrefix = 'learning_frontend_crud_item_add';

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    protected function _construct()
    {
        $this->_init('Learning\FrontendCrud\Model\ResourceModel\Item');
    }
}

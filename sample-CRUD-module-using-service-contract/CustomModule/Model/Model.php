<?php

namespace Stackexchange\CustomModule\Model;

use Stackexchange\CustomModule\Api\Data\ModelInterface;

class Model extends \Magento\Framework\Model\AbstractModel implements
    \Stackexchange\CustomModule\Api\Data\ModelInterface
{
    protected function _construct()
    {
        $this->_init('Stackexchange\CustomModule\Model\ResourceModel\Model');
    }

    /**
     * @inheritdoc
     */
    public function getEntityId()
    {
        return $this->_getData('entity_id');
    }

    /**
     * @inheritdoc
     */
    public function setEntityId($id)
    {
        $this->setData('entity_id', $id);
    }

    /**
     * @inheritdoc
     */
    public function getProductId()
    {
        return $this->_getData('product_id');
    }

    /**
     * @inheritdoc
     */
    public function setProductId($productId)
    {
        $this->setData('product_id', $productId);
    }

    /**
     * @inheritdoc
     */
    public function getCustomerName()
    {
        return $this->_getData('customer_name');
    }

    /**
     * @inheritdoc
     */
    public function setCustomerName($customerName)
    {
        $this->setData('customer_name', $customerName);
    }

    /**
     * @inheritdoc
     */
    public function getCustomerEmail()
    {
        return $this->_getData('customer_email');
    }

    /**
     * @inheritdoc
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->setData('customer_email', $customerEmail);
    }

    /**
     * @inheritdoc
     */
    public function getCustomerComments()
    {
        return $this->_getData('customer_comments');
    }

    /**
     * @inheritdoc
     */
    public function setCustomerComments($customerComments)
    {
        $this->setData('customer_comments', $customerComments);
    }

    /**
     * @inheritdoc
     */
    public function getDateAdded()
    {
        return $this->_getData('date_added');
    }

    /**
     * @inheritdoc
     */
    public function setDateAdded($date)
    {
        $this->setData('date_added', $date);
    }

    /**
     * @inheritdoc
     */
    public function getDateUpdated()
    {
        return $this->_getData('date_updated');
    }

    /**
     * @inheritdoc
     */
    public function setDateUpdated($date)
    {
        $this->setData('date_updated', $date);
    }
}

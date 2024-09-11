<?php

namespace Certification\ProductComment\Model;

use Certification\ProductComment\Api\Data\ProductCommentInterface;

class ProductComment extends \Magento\Framework\Model\AbstractModel implements
    \Certification\ProductComment\Api\Data\ProductCommentInterface
{

    /**
     * Cache tag
     */
    const CACHE_TAG = 'comment_block';

    protected function _construct()
    {
        $this->_init('Certification\ProductComment\Model\ResourceModel\ProductComment');
    }

    /**
     * @inheritdoc
     */
    public function getCommentId()
    {
        return $this->_getData('comment_id');
    }

    /**
     * @inheritdoc
     */
    public function setCommentId($id)
    {
        $this->setData('comment_id', $id);
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
    public function getCustomerId()
    {
        return $this->_getData('customer_id');
    }

    /**
     * @inheritdoc
     */
    public function setCustomerId($customerId)
    {
        $this->setData('customer_id', $customerId);
    }
    /**
     * @inheritdoc
     */
    public function getCustomerGuest()
    {
        return $this->_getData('customer_guest');
    }

    /**
     * @inheritdoc
     */
    public function setCustomerGuest($customerguest)
    {
        $this->setData('customer_guest', $customerguest);
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
    public function getCreatedAt()
    {
        return $this->_getData('created_at');
    }

    /**
     * @inheritdoc
     */
    public function setCreatedAt($date)
    {
        $this->setData('created_at', $date);
    }
}

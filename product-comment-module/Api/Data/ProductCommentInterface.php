<?php
namespace Certification\ProductComment\Api\Data;

interface ProductCommentInterface
{
    /**
     * Return the Comment ID
     *
     * @return int
     */
    public function getCommentId();

    /**
     * Set Comment ID
     *
     * @param int $id
     * @return $this
     */
    public function setCommentId($id);

    /**
     * Return the Product ID associated with Comment
     *
     * @return int
     */
    public function getProductId();

    /**
     * Set the Product ID associated with Comment
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Return the Customer ID associated with comment
     *
     * @return int
     */
    public function getCustomerId();

    /**
     * Set the Customer ID associated with comment
     *
     * @param int $productId
     * @return $this
     */
    public function setCustomerId($customerId);

    /**
     * Return the guest customer associated with comment
     *
     * @return int
     */
    public function getCustomerGuest();

    /**
     * Set the guest associated with comment
     *
     * @param int $productId
     * @return $this
     */
    public function setCustomerGuest($value);

    /**
     * Return the Customer Email
     *
     * @return string
     */
    public function getCustomerEmail();

    /**
     * Set the Customer Email
     *
     * @param string $customerEmail
     * @return $this
     */
    public function setCustomerEmail($customerEmail);

    /**
     * Return the Customer Comments
     *
     * @return string
     */
    public function getCustomerComments();

    /**
     * Set the Customer Comments
     *
     * @param string $customerComments
     * @return $this
     */
    public function setCustomerComments($customerComments);

    /**
     * Return the Date and Time of record added
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Set the Date and Time of record added
     *
     * @param string $date
     * @return $this
     */
    public function setCreatedAt($date);


}

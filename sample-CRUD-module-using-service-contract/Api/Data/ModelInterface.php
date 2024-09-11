<?php
namespace Stackexchange\CustomModule\Api\Data;

interface ModelInterface
{
    /**
     * Return the Entity ID
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set Entity ID
     *
     * @param int $id
     * @return $this
     */
    public function setEntityId($id);

    /**
     * Return the Product ID associated with Quote
     *
     * @return int
     */
    public function getProductId();

    /**
     * Set the Product ID associated with Quote
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Return the Customer Name
     *
     * @return string
     */
    public function getCustomerName();

    /**
     * Set the Customer Name
     *
     * @param string $customerName
     * @return $this
     */
    public function setCustomerName($customerName);

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
    public function getDateAdded();

    /**
     * Set the Date and Time of record added
     *
     * @param string $date
     * @return $this
     */
    public function setDateAdded($date);

    /**
     * Return the Date and Time of record updated
     *
     * @return string
     */
    public function getDateUpdated();

    /**
     * Set the Date and Time of record updated
     *
     * @param string $date
     * @return $this
     */
    public function setDateUpdated($date);
}

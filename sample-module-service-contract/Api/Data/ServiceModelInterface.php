<?php

namespace Certification\ServiceContract\Api\Data;

interface ServiceModelInterface
{
    /**
     * Return the Entity ID
     *
     * @return int
     */
    public function getId();

    /**
     * Set Entity ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Name
     *
     * @return int
     */
    public function getFirstName();

    /**
     * set first_name
     *
     * @param string $name
     * @return $this
     */
    public function setFirstName($firstname);

    /**
     * Name
     *
     * @return string
     */
    public function getLastName();

    /**
     * set first_name
     *
     * @param string $name
     * @return $this
     */
    public function setLastName($lastname);

    /**
     * Return
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set value
     *
     * @param string $customerName
     * @return $this
     */
    public function setEmail($email);

    /**
     * Return status
     *
     * @return string
     */
    public function getStatus();

    /**
     * Set value
     *
     * @param string $customerName
     * @return $this
     */
    public function setStatus($status);

    /**
     * Return store Id
     *
     * @return string
     */
    public function getStoreId();

    /**
     * Set value
     *
     * @param string $storeId
     * @return $this
     */
    public function setStoreId($storeId);


}

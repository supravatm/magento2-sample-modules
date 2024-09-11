<?php

namespace Learning\FrontendCrud\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ItemInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return void
     */
    public function setEmail($email);
    /**
     * @return string
     */
    public function getTelephone();

    /**
     * @param string $telephone
     * @return void
     */
    public function setTelephone($telephone);

    /**
     * @return string
     */
    public function getComment();

    /**
     * @param string $comment
     * @return void
     */
    public function setComment($comment);

}

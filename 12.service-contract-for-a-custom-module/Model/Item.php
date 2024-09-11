<?php

namespace Learning\FrontendCrud\Model;

use Learning\FrontendCrud\Api\Data\ItemInterface;
use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel implements ItemInterface
{
    const ID = 'id';
    const NAME = 'id';
    const EMAIL = 'email';
    const TELEPHONE = 'telephone';
    const COMMENT = 'comment';

    public function getId()
    {
        return $this->_getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getEmail()
    {
        return $this->_getData(self::EMAIL);
    }

    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    public function getTelephone()
    {
        return $this->_getData(self::TELEPHONE);
    }

    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }

    public function getComment()
    {
        return $this->_getData(self::COMMENT);
    }

    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }
    protected function _construct()
    {
        $this->_init('Learning\FrontendCrud\Model\ResourceModel\Item');
    }
}

<?php
namespace Certification\ServiceContract\Model;

class ServiceModel extends \Magento\Framework\Model\AbstractModel implements
    \Certification\ServiceContract\Api\Data\ServiceModelInterface
{
    protected function _construct()
    {
        $this->_init('Certification\ServiceContract\Model\ResourceModel\ServiceModel');
    }

    public function getId()
    {
        return $this->_getData('id');
    }
    public function setId($id)
    {
        $this->setData('entity_id', $id);
    }

    public function getFirstName()
    {
        return $this->_getData('first_name');
    }
    public function setFirstName($firstname)
    {
        $this->setData('first_name', $firstname);
    }

    public function getLastName()
    {
        return $this->_getData('last_name');
    }
    public function setLastName($lastname)
    {
        $this->setData('last_name', $lastname);
    }

    public function getEmail()
    {
        return $this->_getData('email');
    }
    public function setEmail($email)
    {
        $this->setData('email', $email);
    }

    public function getStatus()
    {
        return $this->_getData('status');
    }
    public function setStatus($status)
    {
        $this->setData('status', $status);
    }

    public function getStoreId()
    {
        return $this->_getData('store_id');
    }
    public function setStoreId($storeId)
    {
        $this->setData('store_id', $storeId);
    }
}
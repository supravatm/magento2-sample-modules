<?php
namespace Certification\ServiceContract\Model\ResourceModel\ServiceModel;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'certification_servicecontract_collection';
    protected $_eventObject = 'servicecontract_collection';
    protected function _construct()
    {
        $this->_init('Certification\ServiceContract\Model\ServiceModel', 'Certification\ServiceContract\Model\ResourceModel\ServiceModel');
    }
}
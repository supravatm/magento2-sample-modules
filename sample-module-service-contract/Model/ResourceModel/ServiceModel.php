<?php
namespace Certification\ServiceContract\Model\ResourceModel;

class ServiceModel extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('certification_servicecontract','id');
    }
}
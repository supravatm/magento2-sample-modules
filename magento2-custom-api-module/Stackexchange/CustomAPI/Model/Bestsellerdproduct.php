<?php

namespace Stackexchange\CustomAPI\Model;

use Magento\Framework\ObjectManagerInterface;

class Bestsellerdproduct implements \Stackexchange\CustomAPI\Api\BestsellerdproductManagementInterface
{


    protected $_objectManagerInterface;

    public function __construct(
        ObjectManagerInterface $objectManagerInterface,
        array $data = []
    )
    {
        $this->_objectManagerInterface = $objectManagerInterface;
    }


    public function getProducts()
    {
        $productCollection = $this->_objectManagerInterface->create('\Magento\Reports\Model\ResourceModel\Report\Collection\Factory');
        $collection = $productCollection->create('Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection');
        $collection->setPeriod('year');

        $data = [];
        foreach ($collection as $item) {
            $data[] = $item->getData();
        }
        return $data;
    }
}
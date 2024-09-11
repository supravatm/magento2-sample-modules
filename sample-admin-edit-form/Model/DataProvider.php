<?php

namespace Certification\SampleAdminForm\Model;

use \Magento\Banner\Model\ResourceModel\Banner\CollectionFactory;
use \Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create()->addStoresVisibility();
    }

    public function getData()
    {
        return parent::getData(); // TODO: Change the autogenerated stub
    }
}

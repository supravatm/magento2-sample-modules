<?php

namespace Stackexchange\CustomAPI\Model;


class BestsellerdproductRepository implements \Stackexchange\CustomAPI\Api\BestsellerdproductManagementInterface
{
    protected $collectionFactory;
    protected $bestsellersCollection;

    public function __construct(
        \Magento\Reports\Model\ResourceModel\Report\Collection\Factory $resourceFactory,
        array $data = []
    )
    {
        $this->collectionFactory = $resourceFactory;

    }


    public function getList()
    {
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $collection */
        //$productCollection = $this->collectionFactory->create();

        $collection = $this->collectionFactory->create('Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection');

        $data = [];
        foreach ($collection as $item) {
            $data[] = $item->getData();
        }
        return $data;
    }
}
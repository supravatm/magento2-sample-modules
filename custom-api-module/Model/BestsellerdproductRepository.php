<?php

namespace Stackexchange\CustomAPI\Model;


class BestsellerdproductRepository implements \Stackexchange\CustomAPI\Api\BestsellerdproductManagementInterface
{
    protected $collectionFactory;
    protected $collectionProcessor;
    protected $searchResultsFactory;


    public function __construct(
        \Magento\Reports\Model\ResourceModel\Report\Collection\Factory $resourceFactory,
        \Magento\Catalog\Api\Data\ProductSearchResultsInterfaceFactory $searchResultsFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor = null,
        array $data = []
    )
    {
        $this->collectionFactory = $resourceFactory;
        //$this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();

        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();

    }


    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $collection */
        //$productCollection = $this->collectionFactory->create();

        $collection = $this->collectionFactory->create('Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection');


        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        //searchCriteria[filterGroups][0][filters][0][field]=category_id&
        // searchCriteria[filterGroups][0][filters][0][value]=4&
        // searchCriteria[filterGroups][0][filters][0][conditionType]=eq&
        //searchCriteria[sortOrders][0][field]=created_at&
        // searchCriteria[sortOrders][0][direction]=DESC&
        // searchCriteria[pageSize]=10
        //& searchCriteria[currentPage]=1

        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        $sortOrdersData = $searchCriteria->getSortOrders();

        if ($sortOrdersData) {
            foreach ($sortOrdersData as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $data = [];
        foreach ($collection as $item) {
            $data[]= $item->getData();
        }
        echo $collection->getSelect()->__toString();
        return json_encode($data);
    }
}

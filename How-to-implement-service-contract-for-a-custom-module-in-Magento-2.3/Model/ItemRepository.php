<?php

namespace Learning\FrontendCrud\Model;

use Learning\FrontendCrud\Api\Data\ItemInterface;
use Learning\FrontendCrud\Model\ItemFactory;
use Learning\FrontendCrud\Api\Data\ItemSearchResultInterfaceFactory;
use Learning\FrontendCrud\Api\ItemRepositoryInterface;
use Learning\FrontendCrud\Model\ResourceModel\Item\Collection;
use Learning\FrontendCrud\Model\ResourceModel\Item\CollectionFactory as ItemCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;

class ItemRepository implements ItemRepositoryInterface
{
    /**
     * @var ItemFactory
     */
    private $itemFactory;

    /**
     * @var ItemCollectionFactory
     */
    private $itemCollectionFactory;

    /**
     * @var ItemSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    public function __construct(
        ItemFactory $itemFactory,
        ItemCollectionFactory $itemCollectionFactory,
        ItemSearchResultInterfaceFactory $ItemSearchResultInterfaceFactory
    ) {
        $this->itemFactory = $itemFactory;
        $this->itemCollectionFactory = $itemCollectionFactory;
        $this->searchResultFactory = $ItemSearchResultInterfaceFactory;
    }

    public function getById($id)
    {
        $item = $this->itemFactory->create();
        $item->getResource()->load($item, $id);
        if (!$item->getId()) {
            throw new NoSuchEntityException(__('Unable to find Item with ID "%1"', $id));
        }
        return $item;
    }

    public function save(ItemInterface $item)
    {
        $item->getResource()->save($item);
        return $item;
    }

    public function delete(ItemInterface $item)
    {
        $item->getResource()->delete($item);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->itemCollectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}

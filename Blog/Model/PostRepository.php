<?php
namespace SMG\Blog\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use SMG\Blog\Api\Data\PostInterface;
use SMG\Blog\Api\Data\PostSearchResultInterface;
use SMG\Blog\Api\Data\PostSearchResultsInterfaceFactory;
use SMG\Blog\Api\PostRepositoryInterface;
use SMG\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use SMG\Blog\Model\ResourceModel\Post\Collection;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var PostFactory
     */
    private $postFactory;

    /**
     * @var PostCollectionFactory
     */
    private $postCollectionFactory;

    /**
     * @var PostSearchResultsInterfaceFactory
     */
    private $searchResultFactory;

    public function __construct(
        PostFactory $postFactory,
        PostCollectionFactory $postCollectionFactory,
        PostSearchResultsInterfaceFactory $postSearchResultsInterfaceFactory
    ) {
        $this->postFactory = $postFactory;
        $this->postCollectionFactory = $postCollectionFactory;
        $this->searchResultFactory = $postSearchResultsInterfaceFactory;
    }

    public function getById($id)
    {
        $post = $this->postFactory->create();
        $post->getResource()->load($post, $id);
        if (! $post->getId()) {
            throw new NoSuchEntityException(__('Unable to find post with ID "%1"', $id));
        }
        return $post;
    }

    public function save(PostInterface $post)
    {
        $post->getResource()->save($post);
        return $post;
    }

    public function delete(PostInterface $post)
    {
        $post->getResource()->delete($post);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

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
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
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
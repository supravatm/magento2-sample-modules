<?php

namespace Learning\FrontendCrud\Api;

use Learning\FrontendCrud\Api\Data\ItemInterface;
use Learning\FrontendCrud\Api\Data\ItemSearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface ItemRepositoryInterface
{

    /**
     * @param int $id
     * @return ItemInterface
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param ItemInterface $item
     * @return ItemInterface
     */
    public function save(ItemInterface $item);

    /**
     * @param ItemInterface $item
     * @return void
     */
    public function delete(ItemInterface $item);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ItemSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}

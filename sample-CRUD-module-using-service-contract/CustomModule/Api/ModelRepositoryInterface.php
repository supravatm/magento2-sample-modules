<?php

namespace Stackexchange\CustomModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Stackexchange\CustomModule\Api\Data\ModelInterface;

interface ModelRepositoryInterface
{
    /**
     * @api
     * @param \Stackexchange\CustomModule\Api\Data\ModelInterface $model
     * @return \Stackexchange\CustomModule\Api\Data\ModelInterface
     */
    public function save(ModelInterface $model);

    /**
     * @api
     * @param \Stackexchange\CustomModule\Api\Data\ModelInterface $model
     * @return \Stackexchange\CustomModule\Api\Data\ModelInterface
     */
    public function delete(ModelInterface $model);

    /**
     * @api
     * @param \Stackexchange\CustomModule\Api\Data\ModelInterface $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @api
     * @param int $id
     * @return \Stackexchange\CustomModule\Api\Data\ModelInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Stackexchange\CustomModule\Api\Data\ModelSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}

<?php

namespace Certification\ServiceContract\Api;

use \Magento\Framework\Api\SearchCriteriaInterface;
use \Certification\ServiceContract\Api\Data\ServiceModelInterface;

interface ServiceModelRepositoryInterface
{

    /**
     * @api
     * @param \Certification\ServiceContract\Api\Data\ServiceModelInterface $model
     * @return \Certification\ServiceContract\Api\Data\ServiceModelInterface
     */
    public function save(ServiceModelInterface $model);

    /**
     * @api
     * @param int $id
     * @return \Certification\ServiceContract\Api\Data\ServiceModelInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Certification\ServiceContract\Api\Data\ServiceModelSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}
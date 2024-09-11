<?php
namespace Certification\ProductComment\Api;

use \Certification\ProductComment\Api\Data\ProductCommentInterface;
use \Magento\Framework\Api\SearchCriteriaInterface;

interface ProductCommentRepositoryInterface
{
    /**
     * @api
     * @param \Certification\ProductComment\Api\Data\ProductCommentInterface $model
     * @return \Certification\ProductComment\Api\Data\ProductCommentInterface
     */
    public function save(ProductCommentInterface $model);

    /**
     * @api
     * @param \Certification\ProductComment\Api\Data\ModelInterface $model
     * @return \Certification\ProductComment\Api\Data\ModelInterface
     */
    public function delete(ProductCommentInterface $model);

    /**
     * @api
     * @param \Certification\ProductComment\Api\Data\ModelInterface $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @api
     * @param int $id
     * @return \Certification\ProductComment\Api\Data\ModelInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Certification\ProductComment\Api\Data\ModelSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}

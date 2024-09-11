<?php

namespace Certification\ProductComment\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Certification\ProductComment\Api\Data\ProductCommentInterface;

interface ProductCommentRepositoryInterface
{
    /**
     * @api
     * @param \Certification\ProductComment\Api\Data\ProductCommentnterface $comment
     * @return \Certification\ProductComment\Api\Data\ProductCommentnterface
     */
    public function save(ProductCommentInterface $comment);

    /**
     * @api
     * @param \Certification\ProductComment\Api\Data\ProductCommentnterface $comment
     * @return \Certification\ProductComment\Api\Data\ProductCommentSearchResultsInterface
     */
    public function delete(ProductCommentInterface $comment);

    /**
     * @api
     * @param \Certification\ProductComment\Api\Data\ProductCommentnterface $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @api
     * @param int $id
     * @return \Certification\ProductComment\Api\Data\ProductCommentSearchResultsInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Certification\ProductComment\Api\Data\ProductCommentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}

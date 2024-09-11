<?php

namespace SMG\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use SMG\Blog\Api\Data\PostInterface;

interface PostRepositoryInterface
{
    /**
     * @param int $id
     * @return \SMG\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \SMG\Blog\Api\Data\PostInterface $post
     * @return \S\Blog\Api\Data\PostInterface
     */
    public function save(PostInterface $post);

    /**
     * @param \SMG\Blog\Api\Data\PostInterface $post
     * @return void
     */
    public function delete(PostInterface $post);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \SMG\Blog\Api\Data\PostSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
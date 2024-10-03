<?php

namespace SMG\Blog\Api;

use SMG\Blog\Api\Data\PostInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface PostRepositoryInterface
{
    /**
     * @api
     * @param  SMG\Blog\Api\Data\PostInterface $post
     * @return SMG\Blog\Api\Data\PostInterface
     */
    public function save(PostInterface $post);

    /**
     * @api
     * @param  SMG\Blog\Api\Data\PostInterface $post
     * @return SMG\Blog\Api\Data\PostInterface
     */
    public function delete(PostInterface $post);

    /**
     * @api
     * @param  int $id
     * @return SMG\Blog\Api\Data\PostInterface
     * @throws void 
     */
    public function deleteById($id);

    /**
     * @api
     * @param int $id
     * @return SMG\Blog\Api\Data\PostInterface
     * @throws Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @api
     * @param Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return SMG\Blog\Api\Data\CustomSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}
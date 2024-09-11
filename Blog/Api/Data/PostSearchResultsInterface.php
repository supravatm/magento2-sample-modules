<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace SMG\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for SMG Post search results.
 * @api
 * @since 100.0.2
 */
interface PostSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get posts list.
     *
     * @return \SMG\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param \SMG\Blog\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
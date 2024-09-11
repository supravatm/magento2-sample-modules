<?php

namespace Certification\ProductComment\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ProductCommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return Certification\ProductComment\Api\Data\ProductCommentSearchResultsInterface[]
     */
    public function getItems();

    /**
     * @param Certification\ProductComment\Api\Data\ProductCommentSearchResultsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

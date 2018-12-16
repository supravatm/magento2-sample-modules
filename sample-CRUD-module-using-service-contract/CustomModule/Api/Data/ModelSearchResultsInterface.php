<?php

namespace Stackexchange\CustomModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ModelSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return Stackexchange\CustomModule\Api\Data\ModelInterface[]
     */
    public function getItems();

    /**
     * @param Stackexchange\CustomModule\Api\Data\ModelInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

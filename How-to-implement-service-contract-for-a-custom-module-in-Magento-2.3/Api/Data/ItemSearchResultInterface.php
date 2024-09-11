<?php

namespace Learning\FrontendCrud\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;
use Learning\FrontendCrud\Api\Data\ItemInterface;

interface ItemSearchResultInterface extends SearchResultsInterface
{

    /**
     * @return ItemInterface[]
     */
    public function getItems();

    /**
     * @param ItemInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}

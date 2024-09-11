<?php
namespace Certification\ServiceContract\Api\Data;
use Magento\Framework\Api\SearchResultsInterface;
interface ServiceModelSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return Certification\ServiceContract\Api\Data\ServiceModelInterface[]
     */
    public function getItems();
    /**
     * @param Certification\ServiceContract\Api\Data\ServiceModelInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
<?php declare(strict_types=1);
 
namespace SMG\OrderExtensionAttribute\Model\ResourceModel\SalesOrder;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use SMG\OrderExtensionAttribute\Model\SalesOrder;
 
class Collection extends AbstractCollection
{
    protected function _construct(): void
    {
        $this->_init(SalesOrder::class, \SMG\OrderExtensionAttribute\Model\ResourceModel\SalesOrder::class);
    }
}
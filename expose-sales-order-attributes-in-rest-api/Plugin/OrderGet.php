<?php


namespace Born\OrderExtensionAttributesAPI\Plugin;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use \Magento\Sales\Model\OrderRepository;

class OrderGet
{

    public function afterGet(
        OrderRepositoryInterface $subject,
        OrderInterface $resultOrder
    )
    {
        $resultOrder = $this->getAccountNumber($resultOrder);

        return $resultOrder;
    }

    private function getAccountNumber(OrderInterface $order)
    {
        $extensionAttributes = $order->getExtensionAttributes ();
        
        if ($extensionAttributes) {
            $extensionAttributes->setAccountNumber( 'custom_value' );
            $order->setExtensionAttributes ( $extensionAttributes );
        }
        return $order;
    }

}

<?php


namespace Born\OrderExtensionAttributesAPI\Plugin;

use Magento\Framework\Exception\CouldNotSaveException;

class OrderSave
{


    public function afterSave(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderInterface $resultOrder
    ) {
        $resultOrder = $this->saveAccountNumber($resultOrder);

        return $resultOrder;
    }
    private function saveAccountNumber(\Magento\Sales\Api\Data\OrderInterface $order)
    {
        $extensionAttributes = $order->getExtensionAttributes();
        if (
            null !== $extensionAttributes &&
            null !== $extensionAttributes->getAccountNumber()
        ) {
            $customAccountNumber = $extensionAttributes->getAccountNumber()->getValue();
            try {
                $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/custom.log');
                $logger = new \Zend\Log\Logger();
                $logger->addWriter($writer);
                $logger->info('Your log details: ' . $customAccountNumber);
                // The actual implementation of the repository is omitted
                // but it is where you would save to the database (or any other persistent storage)
                //$this->foomanExampleRepository->save($order->getEntityId(), $foomanAttributeValue);
            } catch (\Exception $e) {
                throw new CouldNotSaveException(
                    __('Could not add attribute to order: "%1"', $e->getMessage()),
                    $e
                );
            }
        }
        return $order;
    }
}
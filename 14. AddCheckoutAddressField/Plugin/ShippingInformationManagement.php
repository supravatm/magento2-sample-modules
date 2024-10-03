<?php

declare(strict_types=1);

namespace SMG\AddCheckoutAddressField\Plugin;

use Magento\Quote\Api\CartRepositoryInterface;

class ShippingInformationManagement
{
    public $cartRepository;

    public function __construct(
        CartRepositoryInterface $cartRepository
    ) {
        $this->cartRepository = $cartRepository;
    }

    public function beforeSaveAddressInformation($subject, $cartId, $addressInformation)
    {
        $quote = $this->cartRepository->getActive($cartId);
        $deliveryNote = $addressInformation->getShippingAddress()->getExtensionAttributes()->getDeliveryNote();
        $quote->setDeliveryNote($deliveryNote);
        $this->cartRepository->save($quote);
        return [$cartId, $addressInformation];
    }
    
}
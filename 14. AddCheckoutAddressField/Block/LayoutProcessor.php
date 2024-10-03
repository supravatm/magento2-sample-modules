<?php

declare(strict_types=1);

namespace SMG\AddCheckoutAddressField\Block;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface; 
class LayoutProcessor implements LayoutProcessorInterface
{
    public function process($jsLayout)
    {
        $attributeCode = 'delivery_note';
        $fieldConfiguration = [
            'component' => 'Magento_Ui/js/form/element/textarea',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/textarea',
                'tooltip' => [
                    'description' => 'Here you can leave delivery notes',
                ],
            ],
            'dataScope' => 'shippingAddress.custom_attributes' . '.' . $attributeCode,
            'label' => 'Delivery Notes',
            'provider' => 'checkoutProvider',
            'sortOrder' => 1000,
            'validation' => [
                'required-entry' => true
            ],
            'options' => [],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
            'value' => ''
        ];

        $jsLayout['components']['checkout']['children']
        ['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']
        ['children'][$attributeCode] = $fieldConfiguration;
        return $jsLayout;
    }
}
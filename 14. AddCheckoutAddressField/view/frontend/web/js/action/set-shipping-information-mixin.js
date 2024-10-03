/*jshint browser:true jquery:true*/
/*global alert*/
define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper, quote) {
    'use strict';

    return function (setShippingInformationAction) {

        return wrapper.wrap(setShippingInformationAction, function (originalAction) {
            var shippingAddress = quote.shippingAddress();
            if (shippingAddress['extension_attributes'] === undefined) {
                shippingAddress['extension_attributes'] = {};
            }
            console.log(quote.shippingAddress());
            if (shippingAddress.customAttributes !== undefined) {
                var attribute = shippingAddress.customAttributes.find(
                    function (element) {
                        return element.attribute_code === 'delivery_note';
                    }
                );
    
                shippingAddress['extension_attributes']['delivery_note'] = attribute.value;
            }            
            // pass execution to original action ('Magento_Checkout/js/action/set-shipping-information')
            return originalAction();
        });
    };
});

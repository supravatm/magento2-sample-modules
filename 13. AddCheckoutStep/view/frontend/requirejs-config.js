/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'SMG_AddCheckoutStep/js/view/shipping-payment-mixin': true

            },
            'Magento_Checkout/js/action/set-payment-information': {
                'SMG_AddCheckoutStep/js/view/shipping-payment-mixin': true
            }
        }
    }
};
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
    Component,
    rendererList
    ) {
    'use strict';
    rendererList.push(
    {
        type: 'offlinepay',
        component: 'SMG_OfflinePaymentMethod/js/view/payment/method-renderer/offlinepay-method'
    });
    
    // put view login if needed
    return Component.extend({});
});
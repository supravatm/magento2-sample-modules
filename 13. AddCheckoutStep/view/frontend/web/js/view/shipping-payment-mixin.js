define([
    'mage/utils/wrapper'
], function (wrapper) {
    'use strict';

    return function (stepNavigator) {
        stepNavigator.setHash = wrapper.wrapSuper(stepNavigator.setHash, function (hash) {
            this._super(hash);
            // add extended functionality here or modify method logic altogether
        });

        return stepNavigator;
    };
});

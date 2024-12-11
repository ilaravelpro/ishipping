<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1')->middleware('auth:api')->group(function () {
    if (ishipping('routes.api.shipping_methods.status'))
        Route::apiResource('shipping_methods', 'ShippingMethodController', ['as' => 'api']);
    if (ishipping('routes.api.shipments.status')) {
        Route::apiResource('shipments', 'ShipmentController', ['as' => 'api']);
        Route::post('shipments/{record}/send_sms', 'ShipmentController@send_sms')->name('api.shipments.send_sms');
    }
});


Route::namespace('v1')->prefix('v1')->group(function () {
    Route::get('shipping/providers', 'ShippingMethodController@providers', ['as' => 'api.shipping_methods.providers']);
});

<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

return [
    'routes' => [
        'api' => [
            'status' => true,
            'shipping_methods' => ['status' => true],
            'shipments' => ['status' => true],
        ],
    ],
    'database' => [
        'migrations' => [
            'include' => true
        ],
    ],
    'providers' => [
        [
            'name' => 'static',
            'title' => _t('static'),
        ],
        [
            'name' => 'alopeyk',
            'title' => _t('Alo Peyk'),
            'authenticate' => [
                [
                    'label' => _t('Api Key'),
                    'name' => 'private_key'
                ]
            ]
        ],
    ]
];
?>

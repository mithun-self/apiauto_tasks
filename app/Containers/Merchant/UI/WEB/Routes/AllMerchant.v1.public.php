<?php

/** @var Route $router */
$router->get('merchants', [
    'as' => 'web_merchant_get_all_merchants',
    'uses'  => 'MerchantController@getAllMerchants',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->get('merchantfeemapping', [
    'as' => 'web_merchant_merchant_fees_mapping',
    'uses'  => 'MerchantController@MerchantFeesMapping',
    'middleware' => [
      'auth:web',
    ],
]);

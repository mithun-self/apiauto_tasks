<?php

/** @var Route $router */
$router->post('accountfeemap', [
    'as' => 'web_merchant_account_fee_map',
    'uses'  => 'MerchantController@AccountFeeMap',
    'middleware' => [
      'auth:web',
    ],
]);

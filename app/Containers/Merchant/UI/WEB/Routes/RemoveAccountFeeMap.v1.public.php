<?php

/** @var Route $router */
$router->post('removeaccountfeemap', [
    'as' => 'web_merchant_remove_account_fee_map',
    'uses'  => 'MerchantController@RemoveAccountFeeMap',
    'middleware' => [
      'auth:web',
    ],
]);

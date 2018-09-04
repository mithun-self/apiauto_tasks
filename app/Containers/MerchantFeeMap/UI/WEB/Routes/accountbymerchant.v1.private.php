<?php

/** @var Route $router */
$router->get('accountfrommerchant/{id}', [
    'as' => 'web_merchantfeemap_accounts_from_merchant',
    'uses'  => 'Controller@AccountsFromMerchant',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->post('feebyaccount', [
    'as' => 'web_merchantfeemap_fee_by_account_for_map',
    'uses'  => 'Controller@FeeByAccountForMap',
    'middleware' => [
      'auth:web',
    ],
]);

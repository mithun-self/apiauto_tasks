<?php

/** @var Route $router */
$router->post('fee/store', [
    'as' => 'web_fee_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);

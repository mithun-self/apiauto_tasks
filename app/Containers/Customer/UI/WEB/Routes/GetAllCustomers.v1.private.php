<?php

/** @var Route $router */
$router->get('customers', [
    'as' => 'web_customer_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
$router->get('customerdetail/{id}', [
    'as' => 'web_customer_index',
    'uses'  => 'Controller@planbill',
    'middleware' => [
      'auth:web',
    ],
]);

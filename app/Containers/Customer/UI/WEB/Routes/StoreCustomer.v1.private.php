<?php

/** @var Route $router */
$router->post('customers/store', [
    'as' => 'web_customer_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);

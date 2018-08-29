<?php

/** @var Route $router */
$router->get('customers/create', [
    'as' => 'web_customer_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);

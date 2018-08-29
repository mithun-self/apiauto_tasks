<?php

/** @var Route $router */
$router->patch('customers/{id}', [
    'as' => 'web_customer_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);

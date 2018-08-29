<?php

/** @var Route $router */
$router->get('customers/{id}', [
    'as' => 'web_customer_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);

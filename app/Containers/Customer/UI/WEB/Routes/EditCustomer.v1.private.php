<?php

/** @var Route $router */
$router->get('customers/{id}/edit', [
    'as' => 'web_customer_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);

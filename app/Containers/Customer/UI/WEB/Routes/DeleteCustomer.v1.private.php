<?php

/** @var Route $router */
$router->delete('customers/{id}', [
    'as' => 'web_customer_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);

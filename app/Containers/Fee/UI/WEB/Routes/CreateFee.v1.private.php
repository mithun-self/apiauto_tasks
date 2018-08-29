<?php

/** @var Route $router */
$router->get('fee/create', [
    'as' => 'web_fee_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);

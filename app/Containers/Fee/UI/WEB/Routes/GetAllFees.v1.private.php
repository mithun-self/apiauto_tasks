<?php

/** @var Route $router */
$router->get('fee', [
    'as' => 'web_fee_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

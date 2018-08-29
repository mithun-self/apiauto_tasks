<?php

/** @var Route $router */
$router->patch('fee/{id}', [
    'as' => 'web_fee_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);

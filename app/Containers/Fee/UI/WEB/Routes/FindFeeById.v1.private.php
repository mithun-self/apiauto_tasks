<?php

/** @var Route $router */
$router->get('fee/{id}', [
    'as' => 'web_fee_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->get('fee/{id}/edit', [
    'as' => 'web_fee_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);

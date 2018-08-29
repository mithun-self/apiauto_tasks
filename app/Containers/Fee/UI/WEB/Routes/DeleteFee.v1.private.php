<?php

/** @var Route $router */
$router->delete('fee/{id}', [
    'as' => 'web_fee_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);

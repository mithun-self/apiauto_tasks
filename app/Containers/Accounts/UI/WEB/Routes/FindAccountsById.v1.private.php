<?php

/** @var Route $router */
$router->get('accounts/{id}', [
    'as' => 'web_accounts_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);

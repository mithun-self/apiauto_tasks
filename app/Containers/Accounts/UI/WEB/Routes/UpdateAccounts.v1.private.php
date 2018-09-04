<?php

/** @var Route $router */
$router->patch('accounts/{id}', [
    'as' => 'web_accounts_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);

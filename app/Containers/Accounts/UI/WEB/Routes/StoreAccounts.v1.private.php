<?php

/** @var Route $router */
$router->post('accounts/store', [
    'as' => 'web_accounts_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);

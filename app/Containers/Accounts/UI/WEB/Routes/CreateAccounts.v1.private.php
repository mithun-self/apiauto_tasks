<?php

/** @var Route $router */
$router->get('accounts/create', [
    'as' => 'web_accounts_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);

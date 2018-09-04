<?php

/** @var Route $router */
$router->get('accounts', [
    'as' => 'web_accounts_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

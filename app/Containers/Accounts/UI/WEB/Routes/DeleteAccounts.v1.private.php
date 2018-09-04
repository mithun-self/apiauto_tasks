<?php

/** @var Route $router */
$router->delete('accounts/{id}', [
    'as' => 'web_accounts_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);

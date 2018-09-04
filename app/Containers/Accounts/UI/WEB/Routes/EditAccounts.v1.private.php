<?php

/** @var Route $router */
$router->get('accounts/{id}/edit', [
    'as' => 'web_accounts_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);

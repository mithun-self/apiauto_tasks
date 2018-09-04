<?php

/** @var Route $router */
$router->get('accountfeemaps/{id}/edit', [
    'as' => 'web_accountfeemap_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);

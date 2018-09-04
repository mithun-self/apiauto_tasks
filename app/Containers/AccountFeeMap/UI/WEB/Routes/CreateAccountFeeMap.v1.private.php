<?php

/** @var Route $router */
$router->get('accountfeemaps/create', [
    'as' => 'web_accountfeemap_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);

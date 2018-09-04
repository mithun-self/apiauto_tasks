<?php

/** @var Route $router */
$router->get('merchantfeemaps/create', [
    'as' => 'web_merchantfeemap_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);

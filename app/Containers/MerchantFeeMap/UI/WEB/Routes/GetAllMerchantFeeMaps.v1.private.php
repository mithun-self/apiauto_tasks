<?php

/** @var Route $router */
$router->get('merchantfeemaps', [
    'as' => 'web_merchantfeemap_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

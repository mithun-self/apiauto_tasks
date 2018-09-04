<?php

/** @var Route $router */
$router->post('merchantfeemaps/store', [
    'as' => 'web_merchantfeemap_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);

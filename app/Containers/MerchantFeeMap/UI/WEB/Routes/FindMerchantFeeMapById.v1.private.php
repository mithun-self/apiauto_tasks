<?php

/** @var Route $router */
$router->get('merchantfeemaps/{id}', [
    'as' => 'web_merchantfeemap_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);

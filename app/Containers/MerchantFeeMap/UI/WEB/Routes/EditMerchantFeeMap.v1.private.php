<?php

/** @var Route $router */
$router->get('merchantfeemaps/{id}/edit', [
    'as' => 'web_merchantfeemap_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);

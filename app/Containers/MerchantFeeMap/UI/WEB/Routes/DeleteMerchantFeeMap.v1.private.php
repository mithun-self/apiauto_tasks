<?php

/** @var Route $router */
$router->delete('merchantfeemaps/{id}', [
    'as' => 'web_merchantfeemap_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->post('newfeesweb/store', [
    'as' => 'web_newfees_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);

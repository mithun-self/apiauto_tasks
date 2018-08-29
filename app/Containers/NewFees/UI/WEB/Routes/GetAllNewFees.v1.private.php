<?php

/** @var Route $router */
$router->get('newfeesweb', [
    'as' => 'web_newfees_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->get('newfeesweb/create', [
    'as' => 'web_newfees_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->get('newfeesweb/{id}', [
    'as' => 'web_newfees_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);

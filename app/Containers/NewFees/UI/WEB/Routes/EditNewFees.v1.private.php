<?php

/** @var Route $router */
$router->get('newfeesweb/{id}/edit', [
    'as' => 'web_newfees_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);

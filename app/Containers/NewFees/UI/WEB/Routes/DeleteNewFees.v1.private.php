<?php

/** @var Route $router */
$router->delete('newfeesweb/{id}', [
    'as' => 'web_newfees_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->get('accountfeemaps', [
    'as' => 'web_accountfeemap_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

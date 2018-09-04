<?php

/** @var Route $router */
$router->post('accountfeemaps/store', [
    'as' => 'web_accountfeemap_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);

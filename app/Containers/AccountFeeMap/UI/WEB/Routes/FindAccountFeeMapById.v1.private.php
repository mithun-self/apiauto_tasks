<?php

/** @var Route $router */
$router->get('accountfeemaps/{id}', [
    'as' => 'web_accountfeemap_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);

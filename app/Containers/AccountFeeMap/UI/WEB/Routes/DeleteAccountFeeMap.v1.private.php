<?php

/** @var Route $router */
$router->delete('accountfeemaps/{id}', [
    'as' => 'web_accountfeemap_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);

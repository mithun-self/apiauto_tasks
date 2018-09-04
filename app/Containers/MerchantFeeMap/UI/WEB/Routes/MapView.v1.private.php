<?php

/** @var Route $router */
$router->get('mapview', [
    'as' => 'web_merchantfeemap_redirect_to_view',
    'uses'  => 'Controller@RedirectToView',
    'middleware' => [
      'auth:web',
    ],
]);

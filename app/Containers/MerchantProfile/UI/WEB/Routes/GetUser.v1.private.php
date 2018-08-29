<?php

/** @var Route $router */
$router->get('getusers', [
    'as' => 'web_merchantprofile_get_users',
    'uses'  => 'MerchantProfile@GetUsers',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->get('getuserslist', [
    'as' => 'web_merchantprofile_get_users_list',
    'uses'  => 'MerchantProfile@GetUsersList',
    'middleware' => [
      'auth:web',
    ],
]);

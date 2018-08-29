<?php

/** @var Route $router */
$router->get('getroleslist', [
    'as' => 'web_merchantprofile_get_roles_list',
    'uses'  => 'MerchantProfile@GetRolesList',
    'middleware' => [
      'auth:web',
    ],
]);

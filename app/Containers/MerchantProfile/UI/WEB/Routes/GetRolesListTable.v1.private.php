<?php

/** @var Route $router */
$router->get('roleslisttable', [
    'as' => 'web_merchantprofile_roles_to_table',
    'uses'  => 'MerchantProfile@RolesToTable',
    'middleware' => [
      'auth:web',
    ],
]);

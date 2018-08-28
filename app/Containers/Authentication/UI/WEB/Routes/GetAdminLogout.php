<?php

$router->get('/logout', [
    'as'   => 'get_admin_logout_form',
    'uses' => 'Controller@logoutAdmin',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
]);

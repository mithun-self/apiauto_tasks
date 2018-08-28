<?php

/** @var Route $router */
$router->get('create_fees', [
    'as' => 'web_fees_show_fees_form',
    'uses'  => 'FeesController@ShowFeesForm',
    'middleware' => [
      'auth:web',
    ],
]);

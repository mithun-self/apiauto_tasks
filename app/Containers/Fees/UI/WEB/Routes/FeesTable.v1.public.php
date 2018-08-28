<?php

/** @var Route $router */
$router->get('getfeestotable', [
    'as' => 'web_fees_get_all_fees_to_table',
    'uses'  => 'FeesController@GetAllFeesToTable',
    'middleware' => [
      'auth:web',
    ],
]);

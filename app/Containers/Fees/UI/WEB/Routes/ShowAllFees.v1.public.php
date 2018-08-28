<?php

/** @var Route $router */
$router->get('getallfees', [
    'as' => 'web_fees_get_all_fees',
    'uses'  => 'FeesController@GetAllFees',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->post('savefees', [
    'as' => 'web_fees_save_fees',
    'uses'  => 'FeesController@SaveFees',
    'middleware' => [
      'auth:web',
    ],
]);

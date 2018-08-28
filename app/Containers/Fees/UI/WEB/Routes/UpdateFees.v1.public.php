<?php

/** @var Route $router */
$router->post('updatefees', [
    'as' => 'web_fees_update_fees',
    'uses'  => 'FeesController@UpdateFees',
    'middleware' => [
      'auth:web',
    ],
]);

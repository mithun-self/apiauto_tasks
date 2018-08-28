<?php

/** @var Route $router */
$router->get('feesedit/{id}', [
    'as' => 'web_fees_fees_edit',
    'uses'  => 'FeesController@FeesEdit',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/** @var Route $router */
$router->get('feesdelete/{id}', [
    'as' => 'web_fees_fees_delete',
    'uses'  => 'FeesController@FeesDelete',
    'middleware' => [
      'auth:web',
    ],
]);

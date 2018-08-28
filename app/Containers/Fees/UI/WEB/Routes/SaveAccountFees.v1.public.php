<?php

/** @var Route $router */
$router->post('saveaccountfees', [
    'as' => 'web_fees_save_account_fees',
    'uses'  => 'FeesController@SaveAccountFees',
    'middleware' => [
      'auth:web',
    ],
]);

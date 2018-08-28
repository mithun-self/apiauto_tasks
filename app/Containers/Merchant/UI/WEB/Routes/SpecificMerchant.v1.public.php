<?php

/** @var Route $router */
$router->get('specific_merchant/{id}', [
    'as' => 'web_merchant_specific_merchant_details',
    'uses'  => 'MerchantController@SpecificMerchantDetails',
    'middleware' => [
      'auth:web',
    ],
]);

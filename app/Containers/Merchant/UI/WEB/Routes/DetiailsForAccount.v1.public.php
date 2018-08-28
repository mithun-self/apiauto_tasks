<?php

/** @var Route $router */
$router->get('detailsforaccount/{id}', [
    'as' => 'web_merchant_details_for_account',
    'uses'  => 'MerchantController@DetailsForAccount',
    'middleware' => [
      'auth:web',
    ],
]);

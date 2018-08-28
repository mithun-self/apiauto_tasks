<?php

/** @var Route $router */
$router->get('datatable_merchants', [
    'as' => 'web_merchant_get_datatable_all_merchants',
    'uses'  => 'MerchantController@DatatableAllMerchants',
    'middleware' => [
      'auth:web',
    ],
]);

<?php

/**
 * @apiGroup           Merchant
 * @apiName            MerchantController
 *
 * @api                {GET} /v1/merchant/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('merchant/{id}', [
    'as' => 'api_merchant_specific_merchant_details',
    'uses'  => 'MerchantController@SpecificMerchantDetails',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           Merchant
 * @apiName            PostAllMerchants
 *
 * @api                {POST} /v1/postallmerchants Endpoint title here..
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
$router->post('postallmerchants', [
    'as' => 'api_merchant_post_all_merchants',
    'uses'  => 'MerchantController@PostAllMerchants',
    'middleware' => [
      'auth:api',
    ],
]);

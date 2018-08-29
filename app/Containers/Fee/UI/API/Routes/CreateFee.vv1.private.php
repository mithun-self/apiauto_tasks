<?php

/**
 * @apiGroup           Fee
 * @apiName            createFee
 *
 * @api                {POST} /vv1/fee Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         v1.0.0
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
$router->post('fee', [
    'as' => 'api_fee_create_fee',
    'uses'  => 'Controller@createFee',
    'middleware' => [
      'auth:api',
    ],
]);

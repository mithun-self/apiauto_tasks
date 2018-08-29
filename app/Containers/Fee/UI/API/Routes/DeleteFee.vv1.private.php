<?php

/**
 * @apiGroup           Fee
 * @apiName            deleteFee
 *
 * @api                {DELETE} /vv1/fee/:id Endpoint title here..
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
$router->delete('fee/{id}', [
    'as' => 'api_fee_delete_fee',
    'uses'  => 'Controller@deleteFee',
    'middleware' => [
      'auth:api',
    ],
]);

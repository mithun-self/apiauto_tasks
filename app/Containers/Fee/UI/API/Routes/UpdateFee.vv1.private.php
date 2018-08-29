<?php

/**
 * @apiGroup           Fee
 * @apiName            updateFee
 *
 * @api                {PATCH} /vv1/fee/:id Endpoint title here..
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
$router->patch('fee/{id}', [
    'as' => 'api_fee_update_fee',
    'uses'  => 'Controller@updateFee',
    'middleware' => [
      'auth:api',
    ],
]);

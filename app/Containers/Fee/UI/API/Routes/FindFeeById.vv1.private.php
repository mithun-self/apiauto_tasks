<?php

/**
 * @apiGroup           Fee
 * @apiName            findFeeById
 *
 * @api                {GET} /vv1/fee/:id Endpoint title here..
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
$router->get('fee/{id}', [
    'as' => 'api_fee_find_fee_by_id',
    'uses'  => 'Controller@findFeeById',
    'middleware' => [
      'auth:api',
    ],
]);

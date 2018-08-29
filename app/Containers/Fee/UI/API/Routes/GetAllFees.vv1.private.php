<?php

/**
 * @apiGroup           Fee
 * @apiName            getAllFees
 *
 * @api                {GET} /vv1/fee Endpoint title here..
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
$router->get('fee', [
    'as' => 'api_fee_get_all_fees',
    'uses'  => 'Controller@getAllFees',
    'middleware' => [
      'auth:api',
    ],
]);

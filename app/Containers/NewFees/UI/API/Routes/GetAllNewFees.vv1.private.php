<?php

/**
 * @apiGroup           NewFees
 * @apiName            getAllNewFees
 *
 * @api                {GET} /vv1/newfees Endpoint title here..
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
$router->get('newfees', [
    'as' => 'api_newfees_get_all_new_fees',
    'uses'  => 'Controller@getAllNewFees',
    'middleware' => [
      'auth:api',
    ],
]);

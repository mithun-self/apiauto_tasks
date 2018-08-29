<?php

/**
 * @apiGroup           NewFees
 * @apiName            createNewFees
 *
 * @api                {POST} /vv1/newfees Endpoint title here..
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
$router->post('newfees', [
    'as' => 'api_newfees_create_new_fees',
    'uses'  => 'Controller@createNewFees',
    'middleware' => [
      'auth:api',
    ],
]);

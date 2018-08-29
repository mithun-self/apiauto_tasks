<?php

/**
 * @apiGroup           NewFees
 * @apiName            deleteNewFees
 *
 * @api                {DELETE} /vv1/newfees/:id Endpoint title here..
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
$router->delete('newfees/{id}', [
    'as' => 'api_newfees_delete_new_fees',
    'uses'  => 'Controller@deleteNewFees',
    'middleware' => [
      'auth:api',
    ],
]);

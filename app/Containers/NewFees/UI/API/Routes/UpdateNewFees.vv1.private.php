<?php

/**
 * @apiGroup           NewFees
 * @apiName            updateNewFees
 *
 * @api                {PATCH} /vv1/newfees/:id Endpoint title here..
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
$router->patch('newfees/{id}', [
    'as' => 'api_newfees_update_new_fees',
    'uses'  => 'Controller@updateNewFees',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           NewFees
 * @apiName            findNewFeesById
 *
 * @api                {GET} /vv1/newfees/:id Endpoint title here..
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
$router->get('newfees/{id}', [
    'as' => 'api_newfees_find_new_fees_by_id',
    'uses'  => 'Controller@findNewFeesById',
    'middleware' => [
      'auth:api',
    ],
]);

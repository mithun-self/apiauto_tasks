<?php

/**
 * @apiGroup           Customer
 * @apiName            updateCustomer
 *
 * @api                {PATCH} /v1/customers/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
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
$router->patch('customers/{id}', [
    'as' => 'api_customer_update_customer',
    'uses'  => 'Controller@updateCustomer',
   /* 'middleware' => [
      'auth:api',
    ],*/
]);

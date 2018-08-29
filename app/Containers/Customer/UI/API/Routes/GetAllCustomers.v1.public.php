<?php

/**
 * @apiGroup           Customer
 * @apiName            getAllCustomers
 *
 * @api                {GET} /v1/customers Endpoint title here..
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
$router->get('customers', [
    'as' => 'api_customer_get_all_customers',
    'uses'  => 'Controller@getAllCustomers',
   /* 'middleware' => ['auth:api',
    ],*/
]);

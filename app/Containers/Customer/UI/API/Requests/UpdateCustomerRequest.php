<?php

namespace App\Containers\Customer\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class UpdateCustomerRequest.
 */
class UpdateCustomerRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Customer\Data\Transporters\UpdateCustomerTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
         'id'=>'cus',
         'source' => 'tok'
    ];


    protected $map = [
        'id' => 'id',
        'email' => 'mail',
        'description' => 'details',
        'delinquent' => 'fraudulent',
        'currency' => 'native_currency',
        'default_source_id' => 'source'

    ];


    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
         'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
             //'id' => 'required|exists',
            // '{user-input}' => 'required|max:255',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}

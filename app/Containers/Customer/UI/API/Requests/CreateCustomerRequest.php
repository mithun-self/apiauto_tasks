<?php

namespace App\Containers\Customer\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateCustomerRequest.
 */
class CreateCustomerRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Customer\Data\Transporters\CreateCustomerTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        // 'id',
    ];

    protected $config;
    protected $map = [
        'id' => 'id',
        'email' => 'email',
        'desc' => 'description',
        'delinquent' => 'fraudulent',
        'currency' => 'native_currency',
        'default_source_id' => 'source',
        'send_email_address' => 'send_email_address',
        'cc_email_address' => 'cc_email_address',
        'country' => 'country', 'address_1' => 'address_1', 'address_2' => 'address_2', 'city' => 'city',
        'state' => 'state', 'zip' => 'zip', 'phone' => 'phn'
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'email' => 'sometimes|email|max:40',
            'desc' => 'sometimes|min:2|max:50',

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

<?php

namespace App\Containers\AccountFeeMap\Models;

use App\Ship\Parents\Models\Model;

class AccountFeeMap extends Model
{
    protected $table = 'account_fees';

    protected $fillable = [

    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'accountfeemaps';
}

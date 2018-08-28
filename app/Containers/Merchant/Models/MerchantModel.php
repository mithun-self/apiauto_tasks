<?php

namespace App\Containers\Merchant\Models;

use App\Ship\Parents\Models\Model;

class MerchantModel extends Model
{
    protected $table = 'merchants';
    
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
    protected $resourceKey = 'merchantmodels';
}

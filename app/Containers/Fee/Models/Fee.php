<?php

namespace App\Containers\Fee\Models;

use App\Ship\Parents\Models\Model;

class Fee extends Model
{
    protected $table = "fees"; 
    protected $fillable = [
        'name','type','value'
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
    protected $resourceKey = 'fees';
}

<?php

namespace App\Containers\Fees\Models;

use App\Ship\Parents\Models\Model;

class FeesModel extends Model
{
    protected $table = 'fees';
    
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
    protected $resourceKey = 'feesmodels';
}

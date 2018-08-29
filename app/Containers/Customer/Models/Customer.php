<?php

namespace App\Containers\Customer\Models;

use App\Containers\Card\Models\Card;
use App\Containers\Charge\Models\Charge;
use App\Containers\Event\Models\Event;
use App\Containers\Subscription\Models\Subscription;
use App\Ship\Parents\Models\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    protected $fillable = ['id', 'email', 'desc', 'business_vat_id',
        'account_balance', 'merchant_id', 'default_source_id', 'send_email_address', 'cc_email_address',
        'country', 'address_1', 'address_2', 'city', 'state', 'zip', 'phone'
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
    protected $resourceKey = 'customers';

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function subscription()
    {

        return $this->hasMany(Subscription::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function setPrefixAttribute()
    {
        $this->attributes['prefix'] = Str::random(6);
    }
}

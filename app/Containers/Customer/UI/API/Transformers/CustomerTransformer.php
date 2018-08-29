<?php

namespace App\Containers\Customer\UI\API\Transformers;

use App\Containers\Card\UI\API\Transformers\CardTransformer;
use App\Containers\Charge\UI\API\Transformers\ChargeTransformer;
use App\Containers\Customer\Models\Customer;
use App\Containers\Event\UI\API\Transformers\EventTransformer;
use App\Containers\Subscription\Models\Subscription;
use App\Containers\Subscription\UI\API\Transformers\SubscriptionTransformer;
use App\Ship\Parents\Transformers\Transformer;

class CustomerTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'card', 'charge'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'card', 'charge', 'subscription', 'event'
    ];

    /**
     * @param Customer $entity
     *
     * @return array
     */
    public function transform(Customer $entity)
    {
        $response = [
            'object' => 'customer',
            'id' => $entity->getHashedKey('cus'),
            'real_id' => $entity->id,
            'email' => $entity->email,
            'description' => $entity->desc,
            'payment_overdue' => $entity->delinquent,
            'send_mail_address' => $entity->nickname,
            'cc_mail_address' => $entity->cc_email_address,
            'source_id' => $entity->default_source_id == null ? $entity->default_source_id : $entity->getHashedKey('card', $entity->default_source_id),

            'created_at' => $entity->created_at->toDateTimeString(),
            'updated_at' => $entity->updated_at->toDateTimeString(),
            'readable_created_at' => $entity->created_at->diffForHumans(),
            'readable_updated_at' => $entity->updated_at->diffForHumans(),
        ];
        //   $obj = $this->user();
        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }


    public function includeEvent(Customer $customer)
    {
        $event = $customer->events;
        if (!$event->isEmpty()) {
            return $this->collection($event, new EventTransformer);
        } else
            return $this->null();
    }

    public function includeCard(Customer $entity)
    {
        return $this->collection($entity->cards, new CardTransformer());
    }

    public function includeCharge(Customer $entity)
    {
        return $this->collection($entity->charges, new ChargeTransformer());
    }

    public function includeSubscription(Customer $entity)
    {
        return $this->collection($entity->subscription, new SubscriptionTransformer());
    }
}

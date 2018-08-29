<?php

namespace App\Containers\Customer\Actions;

use App\Containers\Customer\Exceptions\InvalidTokenException;
use App\Ship\Events\CreateModelEvent;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CreateCustomerAction extends Action
{
    public function run(Request $request)
    {

        $data = $request->mapRequest( $request->all());

        $default_source_id = [];
        if ($request->has('source'))
        {
            $token_id = $request->decode($request->get('source'));
            $token = Apiato::call('Token@FindTokenByIdTask' , [['id' => $token_id , 'is_used' => 0]] );
            if (is_null($token) ){
                throw new InvalidTokenException('The requested token is not valid or already used');
            }
            $default_source_id = ['default_source_id' => $token->card_id];
        }
        $data=array_merge($data, $default_source_id);
        $customer = Apiato::call('Customer@CreateCustomerTask', [$data]);
        App::make(Dispatcher::class)->dispatch(New CreateModelEvent($customer , 'New customer created'));
        return $customer;
    }
}

<?php

namespace App\Containers\Customer\Actions;

use App\Containers\Customer\Tasks\FindCustomerByIdTask;
use App\Ship\Events\CreateEvent;
use App\Ship\Events\UpdateModelEvent;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;

class UpdateCustomerAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        'email',
         'description'
        ]);
        if ($request->has('source'))
        {
            $token_id = $request->decode($request->get('source'));
            $token = Apiato::call('Token@FindTokenByIdTask' , [['id' => $token_id , 'is_used' => 0]] );
            if (is_null($token) ){
                throw new InvalidTokenException('The requested token is not valid or already used');
            }
            $customer = Apiato::call('Customer@FindCustomerByIdTask', [$request->id]);
            $is_default = $customer->default_source_id==null?1:0;

            if ($is_default){
                $data = array_merge($data , ['default_source_id' =>  $token->card_id]);
                $customer->update($data);
                $customer->save();
            }

            $card_data = ['customer_id' => $customer->id , 'is_default' => $is_default];

            Apiato::call('Card@UpdateCardTask', [$token->card_id, $card_data]);


        }
        else
        {

            $customer = Apiato::call('Customer@UpdateCustomerTask', [$request->id , $data]);

        }

        App::make(Dispatcher::class)->dispatch(New UpdateModelEvent($customer , $customer->id . ' - ' . $customer->email .' is updated' ));



        return $customer;
    }
}

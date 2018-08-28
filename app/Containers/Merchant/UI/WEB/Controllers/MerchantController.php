<?php

namespace App\Containers\Merchant\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\Merchant\Models\MerchantModel;
use App\Containers\Merchant\Models\Accounts;
use View;
use Yajra\Datatables\Datatables;
use App\Containers\Fees\Models\FeesModel;
use App\Containers\Fees\Models\AccountsFee;
use Illuminate\Http\Request;
use DB;

class MerchantController extends WebController
{
	public function getAllMerchants()
    {

       //return datatables()->of(MerchantModel::all())->toJson();
    	//return View::make('merchant::merchants');
    	$merchants = MerchantModel::all();
        $fees = FeesModel::select('id', 'value')->get();
    	return view('merchant::merchants', ['merchants' => $merchants,'fees' => $fees]);
    }

    public function DatatableAllMerchants(){
    	return Datatables::of(MerchantModel::all())->make(true);
    }

    public function SpecificMerchantDetails($id){
    	//$merchant_details = Accounts::where('merchant_id', $id)->get()->toArray();
    	//return view('merchant::merchant_details', ['merchant_details' => $merchant_details]);
        $merchant_details = Accounts::where('merchant_id', $id)->get();
        return response()->json($merchant_details);

    }

    public function MerchantFeesMapping() {
        $merchants = MerchantModel::all();
        $fees = FeesModel::select('id', 'value')->get();
        return view('merchant::merchants_fee_mapping', ['merchants' => $merchants,'fees' => $fees]);
    }

    public function DetailsForAccount(Request $request, $id){
        if($id == 0){//if account id is 0
            if($request->merchant_id == 0){//if merchant id is =
                $account_from_merchant_id = Accounts::all()->pluck('id');//1,2
                $account_count_for_merchant = Accounts::all()->count();
            }else{
                $account_from_merchant_id = Accounts::where('merchant_id',$request->merchant_id)->pluck('id');//1,2
                $account_count_for_merchant = Accounts::where('merchant_id',$request->merchant_id)->count();
            }
        //$get_fees_id_for_accounts = AccountsFee::whereIn('account_id',$account_from_merchant_id)->pluck('fees_id');
        //$selected_fee_name = FeesModel::whereIn('id',$get_fees_id_for_accounts)->get();*/
    
    $get_fees_id_for_accounts = AccountsFee::whereIn('account_id',$account_from_merchant_id)->groupBy('fees_id')->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', $account_count_for_merchant)->pluck('fees_id');
        $selected_fee_id = FeesModel::whereIn('id',$get_fees_id_for_accounts)->pluck('id');
        $selected_fee_name = FeesModel::whereIn('id',$get_fees_id_for_accounts)->get();
        $unselected_fee_name = FeesModel::whereNotIn('id',$selected_fee_id)->get();
        //return $unselected_fee_name;
        return ['selectd_fee'=>$selected_fee_name, 'unselected_fee'=>$unselected_fee_name];

         }else{
            $fees_id = AccountsFee::where('account_id',$id)->pluck('fees_id');
            $selected_fee_name = FeesModel::whereIn('id',$fees_id)->get();
            $unselected_fee_name = FeesModel::whereNotIn('id',$fees_id)->get();
                if(empty($fee_name)){
                  $fee_name = FeesModel::get();
                }
            return ['selectd_fee'=>$selected_fee_name, 'unselected_fee'=>$unselected_fee_name];
        }
    }


    public function AccountFeeMap(Request $request){

        $fees = $request->fees;

        if($request->accounts == 0){//selected account is equal to 0
            if($request->merchant_id == 0){//if merchant id also 0
                $account_count_for_merchant = Accounts::all()->count();
                $get_all_accounts_ids = Accounts::all()->pluck('id');//1,2

                //AccountsFee::whereIn('account_id',$get_all_accounts_ids)->delete();
                foreach ($get_all_accounts_ids as $get_all_accounts_id) {
                    foreach ($fees as $fee) {
                        AccountsFee::where('account_id',$get_all_accounts_id)->where('fees_id',$fee)->delete();
                        $Account_fees = new AccountsFee;
                        $Account_fees->fees_id = $fee;
                        $Account_fees->account_id = $get_all_accounts_id;
                        $Account_fees->save();
                    }
                }

                $all_fees_of_current_account = AccountsFee::whereIn('account_id',$get_all_accounts_ids)->groupBy('fees_id')->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', $account_count_for_merchant)->pluck('fees_id');
            $updated_unapplied_fee_details =FeesModel::whereNotIn('id',$all_fees_of_current_account)->get();
            $updated_applied_fee_details =FeesModel::whereIn('id',$all_fees_of_current_account)->get();
            return ['un_applied_details'=>$updated_unapplied_fee_details,'applied_fee_details'=>$updated_applied_fee_details];
            }else{

                $get_all_accounts_ids = Accounts::where('merchant_id',$request->merchant_id)->pluck('id');//1,2
                //AccountsFee::whereIn('account_id',$get_all_accounts_ids)->delete();
                foreach ($get_all_accounts_ids as $get_all_accounts_id) {
                    foreach ($fees as $fee) {
                        AccountsFee::where('account_id',$get_all_accounts_id)->where('fees_id',$fee)->delete();
                        $Account_fees = new AccountsFee;
                        $Account_fees->fees_id = $fee;
                        $Account_fees->account_id = $get_all_accounts_id;
                        $Account_fees->save();
                    }
                }

                $all_fees_of_current_account = AccountsFee::whereIn('account_id',$get_all_accounts_ids)->pluck('fees_id');

            $updated_unapplied_fee_details =FeesModel::whereNotIn('id',$all_fees_of_current_account)->get();
            $updated_applied_fee_details =FeesModel::whereIn('id',$all_fees_of_current_account)->get();
            return ['un_applied_details'=>$updated_unapplied_fee_details,'applied_fee_details'=>$updated_applied_fee_details];

            }
        
        

        }else{
            foreach ($fees as $fee) {
                $Account_fees = new AccountsFee;
                $Account_fees->fees_id = $fee;
                $Account_fees->account_id = $request->accounts;
                $Account_fees->save();
            }
            $all_fees_of_current_account = AccountsFee::where('account_id',$request->accounts)->pluck('fees_id');
            $updated_unapplied_fee_details =FeesModel::whereNotIn('id',$all_fees_of_current_account)->get();
            $updated_applied_fee_details =FeesModel::whereIn('id',$all_fees_of_current_account)->get();
            return ['un_applied_details'=>$updated_unapplied_fee_details,'applied_fee_details'=>$updated_applied_fee_details];
        }//else selected account is greater than 0

    }

    public function RemoveAccountFeeMap(Request $request){

        $fees = $request->fees;//deleted fee also

        if($request->accounts == 0){//if selected account id is 0
            if($request->merchant_id == 0){//if merchant id also 0
                $account_count_for_merchant = Accounts::all()->count();
                $get_all_accounts_ids = Accounts::all()->pluck('id');
                //get_all_accounts_ids = Accounts::where('merchant_id',$request->merchant_id)->pluck('id');//1,2
                foreach ($get_all_accounts_ids as $get_all_accounts_id) {
                    foreach ($fees as $fee) {
                        AccountsFee::where('account_id',$get_all_accounts_id)->where('fees_id',$fee)->delete();
                    }
                }
                $remaining_fees_after_delete = AccountsFee::whereIn('account_id',$get_all_accounts_ids)->groupBy('fees_id')->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', $account_count_for_merchant)->pluck('fees_id');
                 $deleted_fees = FeesModel::whereNotIn('id',$remaining_fees_after_delete)->get();

            }else{

                $get_all_accounts_ids = Accounts::where('merchant_id',$request->merchant_id)->pluck('id');//1,2
                //get_all_accounts_ids = Accounts::where('merchant_id',$request->merchant_id)->pluck('id');//1,2
                foreach ($get_all_accounts_ids as $get_all_accounts_id) {
                    foreach ($fees as $fee) {
                        AccountsFee::where('account_id',$get_all_accounts_id)->where('fees_id',$fee)->delete();
                    }
                }
                $unselected_fees_list = AccountsFee::whereIn('account_id',$get_all_accounts_ids)->groupBy('fees_id')->pluck('fees_id');
                $remaining_fees_after_delete = AccountsFee::whereIn('account_id',$get_all_accounts_ids)->groupBy('fees_id')->get();
                 $deleted_fees = FeesModel::whereNotIn('id',$unselected_fees_list)->get();
            }
            
            if(count($remaining_fees_after_delete) >= 1) {
                foreach($remaining_fees_after_delete as $remaining_fee_after_delete){
                    $remaining_fee[] = FeesModel::where('id',$remaining_fee_after_delete->fees_id)->get();
                }
            }else {
                $remaining_fee = '0';
            }
            return ['deleted_fees'=>$deleted_fees,'remaining_fees_after_delete'=>$remaining_fee];

        }else{
            foreach ($fees as $fee) {
                //$deleted_fees[] = FeesModel::where('id',$fee)->get();
                AccountsFee::where('fees_id',$fee)->where('account_id',$request->accounts)->delete();
            }
            $unselected_fees_list = AccountsFee::where('account_id',$request->accounts)->pluck('fees_id');
            $remaining_fees_after_delete = AccountsFee::where('account_id',$request->accounts)->get();
            $deleted_fees = FeesModel::whereNotIn('id',$unselected_fees_list)->get();
            if(count($remaining_fees_after_delete) >= 1) {
                foreach($remaining_fees_after_delete as $remaining_fee_after_delete){
                    $remaining_fee[] = FeesModel::where('id',$remaining_fee_after_delete->fees_id)->get();
                }
            }else {
                $remaining_fee = '0';
            }
        }//else selected account is greater than 0

        
        
        //return $remaining_fee;
        return ['deleted_fees'=>$deleted_fees,'remaining_fees_after_delete'=>$remaining_fee];

    }

}

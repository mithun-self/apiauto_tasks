<?php

namespace App\Containers\Fees\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use View;
use Illuminate\Http\Request;
use App\Containers\Fees\Models\FeesModel;
use Yajra\DataTables\Facades\DataTables;
use App\Containers\Fees\Models\AccountsFee;

class FeesController extends WebController
{
	
	public function GetAllFees(){
		return View('fees::fees_table');
	}

	public function GetAllFeesToTable(){
		return Datatables::of(FeesModel::All())->make(true);
	}


	public function ShowFeesForm(){
		return View('fees::fees_form');
	}

	public function SaveFees(Request $request){

		//$user = $request->all();
		$fees = new FeesModel;
	    $fees->name = $request->name;
	    $fees->type = $request->type;
	    $fees->value = $request->value;
	    $fees->save();
	    //return redirect()->route('getallfees');
	    return redirect('getallfees')->with('status', 'Fees Created!');
	}

	public function UpdateFees(Request $request){

		$fees = FeesModel::find($request->fee_id);
		$fees->name = $request->name;
	    $fees->type = $request->type;
	    $fees->value = $request->value;
	    $fees->save();

	    return redirect('getallfees')->with('status', 'Updated Successfully!');
	}

	public function FeesDelete($id){
		FeesModel::where('id', $id)->delete();
		return redirect('getallfees')->with('status', 'Deleted Successfully!');

	}

	public function SaveAccountFees(Request $request){

		$accounts = $request->accounts;
		foreach ($accounts as $account) {
			$Account_fees = new AccountsFee;
		    $Account_fees->fees_id = $request->fee;
		    $Account_fees->account_id = $account;
		    $Account_fees->save();
		}
    	return response()->json(['status'=>'Completed']);

	}

	public function FeesEdit($id) {

		$Fees_details = FeesModel::where('id',$id)->get();
		return view('fees::fees_edit')->with('fees_details', $Fees_details);
	}
}

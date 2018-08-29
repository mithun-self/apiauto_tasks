<?php

namespace App\Containers\MerchantProfile\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\User\Models\User;
use Yajra\DataTables\Facades\DataTables;
use DB;

class MerchantProfile extends WebController
{
	public function GetUsers(){
		return View('merchantprofile::users_table');
		//$users = Apiato::call('Customer@GetAllUsersAction', [$request]);

	}

	public function GetUsersList(){
		return Datatables::of(User::All())->make(true);
	}

	public function GetRolesList(){
		return View('merchantprofile::roles_table');
	}

	public function RolesToTable(){
		return Datatables::of(DB::table('roles'))->make(true);
	}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AdminModel;
class AdminController extends Controller
{
    //
   
    public function index()
	{
		$feeds = AdminModel::all();
		

		return view('admin/admin')->with('feeds',$feeds);
	}
}

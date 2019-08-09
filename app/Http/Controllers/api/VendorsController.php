<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;


use App\Model\Vendors;

class VendorsController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
    	$vendors = Vendors::orderBy('id','desc')->select('id','name')->get()->toArray();
    	return response()->json($vendors);
    }


}

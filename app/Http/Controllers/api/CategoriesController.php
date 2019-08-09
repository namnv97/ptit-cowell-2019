<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

use App\Model\Products;
use App\Model\Categories;

class CategoriesController extends Controller
{
	public function create()
	{

	}
    public function show(Request $rq)
    {
    	$type = $rq->type;
    	if($type == 'parent')
    	{
    		$cate = Categories::where('parent_id',0)->orderBy('id','desc')->select('id','name','description')->get()->toArray();
    	}
    	else
    	{
    		if($type == 'child')
    		{
    			$parent = $rq->parent;
    			$cate = Categories::where('parent_id',$parent)->orderBy('id','desc')->select('id','name','description')->get()->toArray();
    		}
    		else
    		{
    			$cate = Categories::orderBy('id','desc')->select('id','name','description')->get()->toArray();
    		}
    	}
    	return response()->json($cate);
    }
}

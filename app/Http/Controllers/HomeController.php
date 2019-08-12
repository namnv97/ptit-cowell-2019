<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Model\Options;
use App\Model\Categories;
use App\Model\Products;
use App\Model\Cart_items;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public $_data = [];
    public function index()
    {

        $sell = Cart_items::select(DB::raw('SUM(quantity) as num', 'quantity'),'product_id as id')->groupBy('product_id')->orderBy('num', 'DESC')->take(4)->get();
        if(count($sell) > 0)
        {
            $are = [];
            foreach($sell as $se)
            {
                $are[] = $se->id;
            }
        }

        if(isset($are))
        {
            $best_seller = Products::whereIn('id',$are)->get();

            $this->_data['best_seller'] = $best_seller;
        }



        $cate_home = Options::where('option_key', '=', 'cate_home')->select('option_value')->first();

        $arr = [];

        if (!empty($cate_home)) :
            $list_cate = json_decode($cate_home->option_value, true);
            if (!empty($list_cate)) :
                foreach ($list_cate as $cat) :
                    $arr[] = $this->get_product_by_cat($cat);
                endforeach;
            endif;
        endif;

        $target = Options::where('option_key','like','%target%')->select('option_value')->get();
        if(count($target) > 0) $this->_data['target'] = $target;

        $this->_data['list_by_cate'] = $arr;
        return view('client.home', $this->_data);
    }


    function get_product_by_cat($id = null)
    {
        if ($id == null) {
            return array();
        }

        $result = [];
        $cate = Categories::find($id);

        $result['cat'] = array(
            'id' => $cate->id,
            'name' => $cate->name
        );

        $products = Products::where('cate_id', '=', $id)->take(8)->get();
        if ($products->count()) {
            $result['products'] = $products;
        }

        return $result;
    }

    public function category($slug = null, Request $request)
    {
        if($slug == null) return redirect()->route('home');

        $cate = Categories::where('slug','=',$slug)->first();

        if(empty($cate)) return redirect()->route('home');

        $this->_data['head_title'] = $cate->name;
        $this->_data['category_description'] = $cate->description;

        if(!empty($request->sort_by)) $sort_by = $request->sort_by;
        if(!empty($request->sort)) $sort = $request->sort;

        if($cate->parent_id == 0):
            $cates = Categories::where('parent_id','=',$cate->id)->get();
            if(count($cates) > 0):
                $ar = [];
                foreach($cates as $ct)
                {
                    $ar[] = $ct->id;
                }
                if(isset($sort_by) && isset($sort)) 
                {
                    $products = Products::whereIn('cate_id',$ar)->orderBy($sort_by,$sort)->paginate(12);
                    $products->withPath('?sort_by='.$sort_by.'&sort='.$sort);
                }
                else 
                {
                    $products = Products::whereIn('cate_id',$ar)->paginate(12);
                    if(!empty($sort_by)) $products->withPath('?sort_by='.$sort_by);
                }
                
                
                if(count($products) > 0) $this->_data['products'] = $products;
            endif;
        else:
            if(isset($sort_by) && isset($sort)):
                $products = Products::where('cate_id','=',$cate->id)->orderBy($sort_by,$sort)->paginate(12);
                $products->withPath('?sort_by='.$sort_by.'&sort='.$sort);
            else:
                $products = Products::where('cate_id','=',$cate->id)->paginate(12);
                if(!empty($sort_by)) $products->withPath('?sort_by='.$sort_by);
            endif;
            if(count($products) > 0) $this->_data['products'] = $products;
        endif;

        return view('client.category',$this->_data);

    }

    public function product($slug = null)
    {
        if($slug == null) return redirect()->route('home');

        $product = Products::where('slug','=',$slug)->first();

        if(empty($product)) return redirect()->route('home');

        $this->_data['head_title'] = $product->name;
        $this->_data['product'] = $product;

        return view('client.product',$this->_data);
    }

    public function search(Request $rq)
    {
        $products = Products::where('name','like','%'.$rq->s.'%')->paginate(12);
        $products->withPath('?s='.$rq->s);
        $this->_data['products'] = $products;
        return view('client.search',$this->_data);
    }

    public function test_branch()
    {
    	return true;
    }

}

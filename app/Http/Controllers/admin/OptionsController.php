<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Options;
use App\Model\Categories;
use App\Http\Requests\StoreOptionsHome;
use App\Http\Requests\StoreHeaderOption;
use App\Http\Requests\StoreOptionsFooter;

class OptionsController extends Controller
{
    public $_data = [];

    public function index()
    {
        $this->_data['head_title'] = "Các thiết lập";
        return view('admin.options.index', $this->_data);
    }

    public function header()
    {
        $logo = Options::where('option_key','=','header_logo')->first();
        $phone = Options::where('option_key','=','header_phone')->first();
        if(!empty($logo)) $this->_data['header_logo'] = $logo->option_value;
        if(!empty($phone)) $this->_data['header_phone'] = $phone->option_value;
        $this->_data['head_title'] = "Thiết lập Header";
        return view('admin.options.header', $this->_data);
    }
    public function header_save(StoreHeaderOption $request)
    {
        $logo = $request->logo;
        $phone = $request->phone;

        $header_logo = Options::where('option_key','=','header_logo')->first();
        if(empty($header_logo))
        {
            $option_logo = new Options();
            $option_logo->option_key = 'header_logo';
            $option_logo->option_value = $logo;
            $option_logo->save();
        }
        else
        {
            $header_logo->option_value = $logo;
            $header_logo->save();
        }

        $header_phone = Options::where('option_key','=','header_phone')->first();
        if(empty($header_logo))
        {
            $option_phone = new Options();
            $option_phone->option_key = 'header_phone';
            $option_phone->option_value = $phone;
            $option_phone->save();
        }
        else
        {
            $header_phone->option_value = $phone;
            $header_phone->save();
        }

        return redirect()->route('admin.options.header')->with('msg', 'Mọi cập nhật đã được lưu');
    }


    public function footer()
    {
        $ft1 = Options::where('option_key','ft1')->first();
        if(!empty($ft1)) $this->_data['ft1'] = json_decode($ft1->option_value,true);
        $ft2 = Options::where('option_key','ft2')->first();
        if(!empty($ft2)) $this->_data['ft2'] = json_decode($ft2->option_value,true);
        $ft3 = Options::where('option_key','ft3')->first();
        if(!empty($ft3)) $this->_data['ft3'] = json_decode($ft3->option_value,true);
        $fb = Options::where('option_key','facebook')->first();
        if(!empty($fb)) $this->_data['fb'] = json_decode($fb->option_value,true);
        $copy = Options::where('option_key','copyright')->first();
        if(!empty($copy)) $this->_data['copyright'] = $copy->option_value;


        $this->_data['head_title'] = "Thiết lập Footer";
        return view('admin.options.footer', $this->_data);
    }
    public function footer_save(StoreOptionsFooter $request)
    {
        $ft1 = array(
        'title' => $request->title1,
        'ctft' => $request->ctft1  
        );

        $ft2 = array(
            'title' => $request->title2,
            'ctft' => $request->ctft2
        );

        $ft3 = array(
            'title' => $request->title3,
            'ctft' => $request->ctft3
        );

        $fb = array(
            'ctft' => $request->facebook
        );

        $dbft1 = Options::where('option_key','ft1')->first();

        if(!empty($dbft1))
        {
            $dbft1->option_value = json_encode($ft1);
            $dbft1->save();
        }
        else
        {
            $dbft1 = new Options();
            $dbft1->option_key = 'ft1';
            $dbft1->option_value = json_encode($ft1);
            $dbft1->save();
        }

        $dbft2 = Options::where('option_key','ft2')->first();

        if(!empty($dbft2))
        {
            $dbft2->option_value = json_encode($ft2);
            $dbft2->save();
        }
        else
        {
            $dbft2 = new Options();
            $dbft2->option_key = 'ft2';
            $dbft2->option_value = json_encode($ft2);
            $dbft2->save();
        }

        $dbft3 = Options::where('option_key','ft3')->first();

        if(!empty($dbft3))
        {
            $dbft3->option_value = json_encode($ft3);
            $dbft3->save();
        }
        else
        {
            $dbft3 = new Options();
            $dbft3->option_key = 'ft3';
            $dbft3->option_value = json_encode($ft3);
            $dbft3->save();
        }

        $fbt = Options::where('option_key','facebook')->first();

        if(!empty($fbt))
        {
            $fbt->option_value = json_encode($fb);
            $fbt->save();
        }
        else
        {
            $fbt = new Options();
            $fbt->option_key = 'facebook';
            $fbt->option_value = json_encode($fb);
            $fbt->save();
        }

        $copyright = Options::where('option_key','copyright')->first();

        if(!empty($copyright))
        {
            $copyright->option_value = $request->copyright;
            $copyright->save();
        }
        else
        {
            $copyright = new Options();
            $copyright->option_key = 'copyright';
            $copyright->option_value = $request->copyright;
            $copyright->save();
        }

        return redirect()->route('admin.options.footer')->with('msg','Mọi cập nhật đã được lưu');
    }



    public function home()
    {
        $cate_home = Options::where('option_key', '=', 'cate_home')->first();
        $cate_value = (empty($cate_home))?[]:json_decode($cate_home->option_value, true);
        $banners = Options::where('option_key', '=', 'banner_home')->first();
        $banners_value = (empty($banners))?[]:json_decode($banners->option_value, true);
        $cates = Categories::all();
        $arr = [];
        if (!empty($cates)) :
            foreach ($cates as $key => $cat) :
                if ($cat->parent_id == 0) {
                    $arr[$cat->id]['label'] = $cat->name;
                    unset($cates[$key]);
                }
            endforeach;

            foreach ($cates as $cat) :
                $arr[$cat->parent_id]['sub'][] = array('id'=>$cat->id,'name'=>$cat->name);
            endforeach;
        endif;
        $target1 = Options::where('option_key','target1')->first();
        if(!empty($target1)) $this->_data['target1'] = json_decode($target1->option_value,true);
        $target2 = Options::where('option_key','target2')->first();
        if(!empty($target2)) $this->_data['target2'] = json_decode($target2->option_value,true);
        $target3 = Options::where('option_key','target3')->first();
        if(!empty($target3)) $this->_data['target3'] = json_decode($target3->option_value,true);
        $this->_data['cates_pr'] = $arr;
        $this->_data['cate_home'] = $cate_value;
        $this->_data['banners'] = $banners_value;
        $this->_data['head_title'] = "Thiết lập Trang chủ";
        $this->_data['list_categories'] = $arr;
        return view('admin.options.home', $this->_data);
    }

    public function home_save(StoreOptionsHome $rq)
    {
        $cate_home = $rq->cate_home;

        $option_cate = Options::where('option_key', '=', 'cate_home')->first();
        if (empty($option_cate)) {
            $option_cate = new Options();
            $option_cate->option_key = 'cate_home';
            $option_cate->option_value = json_encode($cate_home);
            $option_cate->save();
        } else {
            $option_cate->option_value = json_encode($cate_home);
            $option_cate->save();
        }

        if (isset($rq->banner)) {
            $banner = $rq->banner;
            $option_banner = Options::where('option_key', '=', 'banner_home')->first();
            if (empty($option_banner)) {
                $option_banner = new Options();
                $option_banner->option_key = 'banner_home';
                $option_banner->option_value = json_encode($banner);
                $option_banner->save();
            } else {
                $option_banner->option_value = json_encode($banner);
                $option_banner->save();
            }
        }

        
        $red1 = array(
            'img' => $rq->image1,
            'content' => $rq->reddot1
        );

        $red2 = array(
            'img' => $rq->image2,
            'content' => $rq->reddot2
        );

        $red3 = array(
            'img' => $rq->image3,
            'content' => $rq->reddot3
        );

        $res1 = Options::where('option_key','target1')->first();
        if(!empty($res1))
        {
            $res1->option_value = json_encode($red1);
            $res1->save();
        }
        else
        {
            $res1 = new Options();
            $res1->option_key = 'target1';
            $res1->option_value = json_encode($red1);
            $res1->save();
        }

        $res2 = Options::where('option_key','target2')->first();
        if(!empty($res2))
        {
            $res2->option_value = json_encode($red2);
            $res2->save();
        }
        else
        {
            $res2 = new Options();
            $res2->option_key = 'target2';
            $res2->option_value = json_encode($red2);
            $res2->save();
        }

        $res3 = Options::where('option_key','target3')->first();
        if(!empty($res3))
        {
            $res3->option_value = json_encode($red3);
            $res3->save();
        }
        else
        {
            $res3 = new Options();
            $res3->option_key = 'target3';
            $res3->option_value = json_encode($red3);
            $res3->save();
        }

        return redirect()->route('admin.options.home')->with('msg', 'Mọi cập nhật đã được lưu');
    }
}

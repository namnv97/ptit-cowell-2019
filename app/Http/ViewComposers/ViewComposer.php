<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Model\Categories;
use App\Model\Options;
use Illuminate\Http\Request;

class ViewComposer
{
    protected $menus;

    public function compose(View $view)
    {
        $menus = [];
        $cates = Categories::all();
        foreach ($cates as $key => $cat) {
            if ($cat->parent_id == 0) {
                $menus[$cat->id] = ['menu'=>$cat];
                unset($cates[$key]);
            }
        }

        foreach ($cates as $cat) {
            $menus[$cat->parent_id]['sub_menu'][] = $cat;
        }

        $view->with('menus', $menus);

        $option = Options::where('option_key', '=', 'header_logo')->select('option_value')->first();
        $logo = $option->option_value;

        $view->with('logo',$logo);

    }

    public function auth(View $view)
    {
        $view->with('auth', 'name');
    }

    public function slider(View $view)
    {
        $sliders = Options::where('option_key', '=', 'banner_home')->select('option_value')->first();
        $list = json_decode($sliders->option_value, true);
        $view->with('sliders', $list);
    }

    public function client(View $view)
    {
        $option = Options::where('option_key', '=', 'header_logo')->select('option_value')->first();
        $logo = $option->option_value;
        $options = Options::where('option_key', '=', 'header_phone')->select('option_value')->first();
        $phone = $options->option_value;
        $ft1 = Options::where('option_key','ft1')->first();
        if(!empty($ft1))  $view->with('ft1',json_decode($ft1->option_value,true));
        $ft2 = Options::where('option_key','ft2')->first();
        if(!empty($ft2))  $view->with('ft2',json_decode($ft2->option_value,true));
        $ft3 = Options::where('option_key','ft3')->first();
        if(!empty($ft3))  $view->with('ft3',json_decode($ft3->option_value,true));
        $fb = Options::where('option_key','facebook')->first();
        if(!empty($fb))  $view->with('fb',json_decode($fb->option_value,true));
        $copyright = Options::where('option_key','copyright')->first();
        if(!empty($copyright)) $view->with('copyright',$copyright->option_value);
        $view->with('header_logo', $logo);
        $view->with('header_phone',$phone);
    }
}

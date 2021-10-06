<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Menu;
use App\Models\Admin\Sliders;
use App\Models\Admin\Feature;
use App\Models\Admin\Testimony;
use App\Models\Admin\Category;
use App\Models\Admin\Level;
use App\Models\Admin\Section;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function Home(){

        $menus = Menu::orderby('id','asc')->get();
        $sliders = Sliders::orderby('id','asc')->get();
        $features = Feature::where('category','1')->orderby('id','asc')->get();
        $steps = Feature::where('category','2')->orderby('id','asc')->get();
        $testimonies = Testimony::orderby('id','asc')->get();
        $categories = Category::where('category','1')->get();
        $offers = Category::where('category','2')->orderby('id','asc')->get();
        $levels = Level::orderby('id','asc')->get();
        $sections = Section::orderby('id','asc')->get();
        return view('welcome')->with([
            'menus' => $menus,
            'sliders' => $sliders,
            'features' => $features,
            'steps' => $steps,
            'testimonies' => $testimonies,
            'categories' => $categories,
            'offers' => $offers,
            'levels' => $levels,
            'sections' => $sections,

            ]);
    }
}

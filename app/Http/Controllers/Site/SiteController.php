<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //Home
    public function home()
    {
        return view('site.home');
    }

    //Help
    public function help()
    {
        return view('help.center');
    }

    //Terms
    public function terms()
    {
        return view('help.terms');
    }

    //Terms_es
    public function terms_es()
    {
        return view('help.terms_es');
    }

}

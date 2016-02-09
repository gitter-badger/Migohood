<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //Home
    public function home()
    {
        return view('site.home');
    }

    // Search
    public function search(Request $request)
    {
      // If Query Text Empty redirect
      if(!$request->query_text){
        return redirect('/spaces');
      }

        // Text in the input
        $query_text = $request->query_text;

        /****
          Spaces where :
            Public == 'yes' AND (city LIKE 'query_text' OR country LIKE 'query_text')
        ***/
        $spaces = DB::table('spaces')
                      ->where('public', 'yes')
                      ->where(function($query) use ($query_text) {
                          $query->where('city', 'LIKE', '%'. $query_text .'%')
                                ->orWhere('country', 'LIKE', '%'. $query_text .'%');
                      })
                      ->paginate(10);

        return view('app.spaces', ['spaces' => $spaces]);
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

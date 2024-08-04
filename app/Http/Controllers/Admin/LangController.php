<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LangController extends Controller
{
    public function change($locale)
    {
       
        if (in_array($locale, language_helper())) {
            session(['locale' => $locale]);    
            // dd('hey');                 
        }
        return redirect()->back();        
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function changeLang($locale)
    {
       
        if (in_array($locale, language_helper())) {
            session(['locale' => $locale]);    
            // dd('hey');                 
        }
        return redirect()->back();        
    }
}

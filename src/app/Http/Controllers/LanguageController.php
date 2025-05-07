<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLanguage($locale)
    {
        $allowedLocales = ['es', 'en'];

        if (in_array($locale, $allowedLocales)) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}


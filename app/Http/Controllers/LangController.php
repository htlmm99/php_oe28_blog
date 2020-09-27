<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function changeLanguage(Request $request)
    {
        session([
            'lang' => $request->lang,
        ]);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

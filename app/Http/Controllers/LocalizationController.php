<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LocalizationController extends Controller
{
    //
    public function homePage()
    {
        return view('users.home');
    }
    public function checking()
    {
        return view('test');
    }
}

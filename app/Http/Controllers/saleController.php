<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class saleController extends Controller
{
    public function  pos(){ 
        $user = Auth::user();
        return view('adminpages.pos', ['userName' => $user->name,'userEmail' => $user->email]);
      }
}

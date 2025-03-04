<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function success(Request $request){
        return 'success';
    }

    public function failure(Request $request){
        return 'failed';
    }
}

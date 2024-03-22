<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function validasi(Request $request) {
        $validator = \Validator::make($request->all(), [
            'name' => 'required'
        ]);
    }
}

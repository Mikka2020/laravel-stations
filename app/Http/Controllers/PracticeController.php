<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function sample()
    {
        return response('practice', 200);
    }
    public function sample2()
    {
        $test = 'practice2';
        return response($test, 200);
    }
    public function sample3()
    {
        $test = 'test';
        return response($test, 200);
    }
}
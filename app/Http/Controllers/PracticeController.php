<?php

namespace App\Http\Controllers;

use App\Models\Practice;

class PracticeController extends Controller
{
    public function sample()
    {
        return view('practice', ['testParam' => '練習']);
    }
    public function sample2()
    {
        $test = 'practice2';
        return view('practice2', ['testParam' => $test]);
    }
    public function sample3()
    {
        $test = 'test';
        return view('practice3', ['testParam' => $test]);
    }
    public function getPractice()
    {
        $practice = Practice::all();
        return response()->json($practice);
    }
}
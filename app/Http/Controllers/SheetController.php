<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sheet;

class SheetController extends Controller
{
    public function index(Sheet $sheet)
    {
        $sheets = $sheet->all();
        return view('sheets.index', ["sheets" => $sheets]);
    }
}
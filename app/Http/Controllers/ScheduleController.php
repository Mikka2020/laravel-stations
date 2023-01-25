<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Movie;

class ScheduleController extends Controller
{
    public function index($id, Movie $movie)
    {
        $movie = $movie->find($id);
        $schedules = Schedule::where('movie_id', $id)->get();
        return view('movies.detail', ["movie" => $movie, "schedules" => $schedules]);
    }
}
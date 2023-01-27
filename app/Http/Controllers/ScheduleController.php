<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Movie;

class ScheduleController extends Controller
{
    public function index($id, Movie $movie)
    {
        $schedules = Schedule::where('movie_id', $id)->get();
        $movie = $movie->find($schedules[0]->movie_id);
        return view('movies.detail', ["movie" => $movie, "schedules" => $schedules]);
    }
    public function adminIndex(Movie $movie)
    {
        $movies = $movie->all();
        $schedules = Schedule::all();
        return view('admin.schedules.index', ["movies" => $movies,"schedules" => $schedules]);
    }
    public function adminDetail($id, Movie $movie)
    {
        $schedules = Schedule::where('id', $id)->get();
        $movie = $movie->find($schedules[0]->movie_id);
        return view('admin.schedules.detail', ["movie" => $movie, "schedules" => $schedules]);
    }
    public function create($id)
    {
        $movie = Movie::find($id);
        return view('admin.schedules.create', ["movie" => $movie]);
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'movie_id' => ['required', 'numeric'],
            'start_time_date' => ['required', 'date_format:Y-m-d', 'before_or_equal:end_time_date'],
            'start_time_time' => ['required', 'date_format:H:i', 'before_or_equal:end_time_time'],
            'end_time_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:start_time_date'],
            'end_time_time' => ['required', 'date_format:H:i', 'after_or_equal:start_time_time'],
        ]);
        $movie = Movie::find($id);
        $schedule = new Schedule();
        $schedule->start_time = date('Y-m-d H:i', strtotime($request->start_time_date . " " . $request->start_time_time));
        $schedule->end_time = date('Y-m-d H:i', strtotime($request->end_time_date . " " . $request->end_time_time));
        $schedule->movie_id = $movie->id;
        $schedule->save();
        return redirect('/admin/movies/' . $movie->id);
    }
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $movie = Movie::find($schedule->movie_id);
        return view('admin.schedules.edit', ["movie" => $movie, "schedule" => $schedule]);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'movie_id' => ['required', 'numeric'],
            'start_time_date' => ['required', 'date_format:Y-m-d'],
            'start_time_time' => ['required', 'date_format:H:i'],
            'end_time_date' => ['required', 'date_format:Y-m-d'],
            'end_time_time' => ['required', 'date_format:H:i'],
        ]);
        $schedule = Schedule::find($id);
        // date型に変換
        $schedule->start_time = date('Y-m-d H:i', strtotime($request->start_time_date . " " . $request->start_time_time));
        $schedule->end_time = date('Y-m-d H:i', strtotime($request->end_time_date . " " . $request->end_time_time));
        $schedule->save();
        return redirect('/admin/movies/' . $schedule->movie_id);
    }
    public function destroy($id)
    {
        // 削除対象が存在しなければ404エラーを返す
        if (is_null($schedule = Schedule::find($id))) {
            abort(404);
        }
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect('/admin/movies/' . $schedule->movie_id);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', ["movies" => $movies]);
    }
    public function adminIndex()
    {
        $movies = Movie::all();
        return view('admin.movies.index', ["movies" => $movies]);
    }
    public function create()
    {
        return view('admin.movies.create');
    }
    public function store(Request $request)
    {
        $movie = new Movie();
        $request->validate([
            'title' => ['required','unique:movies,title'],
            'image_url' => ['required', 'url'],
            'published_year' => ['required', 'numeric', 'min:1900', 'max:'.date('Y')],
            'is_showing' => ['required', 'boolean'],
            'description' => 'required',
        ]);
        $movie->title = $request->title;
        $movie->image_url = $request->image_url;
        $movie->published_year = $request->published_year;
        $movie->is_showing = $request->is_showing ? true : false;
        $movie->description = $request->description;
        $movie->save();
        return redirect('/admin/movies');
    }
}
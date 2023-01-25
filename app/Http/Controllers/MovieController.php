<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Movie $movie)
    {
        // 検索結果を取得
        $keyword = request()->input('keyword');
        $is_showing = request()->input('is_showing');
        $movies = $movie->search($keyword, $is_showing);
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
            'published_year' => ['required', 'numeric'],
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
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('admin.movies.edit', ["movie" => $movie]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required','unique:movies,title'],
            'image_url' => ['required', 'url'],
            'published_year' => ['required', 'numeric'],
            'is_showing' => 'boolean',
            'description' => 'required',
        ]);
        Movie::find($id)->update([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing' => $request->is_showing ? true : false,
            'description' => $request->description,
        ]);
        return redirect('/admin/movies');
    }
    public function destroy($id)
    {
        // findで見つかったときのみdeleteする、存在しない場合は404を返す
        if (Movie::find($id)) {
            Movie::find($id)->delete();
        } else {
            abort(404);
        }
        return redirect('/admin/movies');
    }
}
<?php
namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view("adminMovieIndex",["movies"=>$movies]);
    }
    public function create(){
        return view("practice");
    }
    public function edit($id){
        $movie = Movie::where('id',$id)->get();
        if (empty($movie))return App::abort("404");
        return view("adminMovieEdit",["movie"=>$movie[0]]);
    }
    public function update(Request $request,$id){
        var_dump($request,$id);
        $movie = Movie::where('id',$id)->get();
        if (empty($movie))return App::abort("404");
        return view("adminMovieEdit",["movie"=>$movie[0]]);
    }
    public function store(Request $request){
        $vaildate = $request->validate([
            'title'=>["required","unique:App\Models\Movie,title"],
            'image_url'=>["required","url"],
            'published_year'=>["required","numeric"],
            'description'=>["required","string"],
            'is_showing'=>["required","boolean"]
        ]);
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->image_url = $request->image_url;
        $movie->published_year = $request->published_year;
        $movie->description = $request->description;
        $movie->is_showing = $request->is_showing;
        $movie->save();
        return redirect("/");
    }
}

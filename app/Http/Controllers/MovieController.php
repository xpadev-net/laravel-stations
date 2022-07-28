<?php
namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = $this->getMovie($request->keyword, $request->is_showing);
        return view("movieIndex",["movies"=>$movies]);
    }
    private function getMovie(mixed $keyword, mixed $is_showing)
    {
        if (isset($keyword)){
            $movie_ = Movie::where("title","like","%".$keyword."%")->orWhere("description","like","%".$keyword."%");
            if (isset($is_showing)){
                $movie_ = $movie_->where("is_showing",$is_showing);
            }
            $movie = $movie_->get();
        }else{
            if (isset($is_showing)){
                $movie = Movie::where("is_showing",$is_showing)->get();
            }else{
                $movie = Movie::all();
            }
        }
        return $movie;
    }

}

<?php
namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminScheduleController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        foreach ($movies as $key=>$value){
            if ($value->schedules->count()===0){
                unset($movies[$key]);
            }
        }
        return view("adminScheduleIndex",["movies"=>$movies]);
    }
    public function create($id){
        return view("practice");//手抜き
    }
    public function store(Request $request,$id){
        $request->validate([
            'movie_id'=>["required","numeric"],
            'start_time_date'=>["required","date_format:Y-m-d"],
            'start_time_time'=>["required","date_format:H:i"],
            'end_time_date'=>["required","date_format:Y-m-d"],
            'end_time_time'=>["required","date_format:H:i"]
        ]);
        $movie = Schedule::where('id',$id)->get();
        if (empty($movie))return App::abort("400");
        $schedule = new Schedule();
        $schedule->movie_id = $id;
        $schedule->start_time = $request->start_time_date." ".$request->start_time_time;
        $schedule->end_time = $request->end_time_date." ".$request->end_time_time;
        $schedule->save();
        return redirect("/");
    }
    public function edit($id){
        $schedule = Schedule::where('id',$id);
        if (empty($schedule))return abort(404);
        return view("practice");//手抜き
    }
    public function update(Request $request,$id){
        $request->validate([
            'movie_id'=>["required","numeric"],
            'start_time_date'=>["required","date_format:Y-m-d"],
            'start_time_time'=>["required","date_format:H:i"],
            'end_time_date'=>["required","date_format:Y-m-d"],
            'end_time_time'=>["required","date_format:H:i"]
        ]);
        $movie = Movie::where('id',$request->movie_id)->get();
        if (empty($movie)||empty($movie[0]))return abort(404);
        $schedule = Schedule::where('id',$id)->get();
        if (empty($schedule)||empty($schedule[0]))return abort(404);
        $schedule = $schedule[0];
        $schedule->start_time = $request->start_time_date." ".$request->start_time_time;
        $schedule->end_time = $request->end_time_date." ".$request->end_time_time;
        $schedule->save();
        return redirect("/");
    }
    public function destroy($id){
        $schedule = Schedule::where('id',$id)->get();
        if (empty($schedule)||empty($schedule[0]))return abort(404);
        $schedule[0]->delete();
        return redirect("/");
    }
}

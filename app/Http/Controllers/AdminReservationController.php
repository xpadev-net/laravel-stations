<?php
namespace App\Http\Controllers;
use App\Models\Reservation;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index(Request $request)
    {
        $movies = Reservation::select()->join('schedules',"reservations.schedule_id", "=","schedules.id")->where("schedules.start_time",">=",CarbonImmutable::now());
        var_dump($movies);
        return view("practice");
    }

}

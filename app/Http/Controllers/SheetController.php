<?php
namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SheetController extends Controller
{
    public function index()
    {
        $sheets = Sheet::all()->reduce(function (array $groups, $row) {
            $groups[$row->row][] = $row;
            return $groups;
        },[]);

        return view("sheetIndex",["sheets"=>$sheets]);
    }
    public function sheets(Request $request,$id,$schedule){
        $validator = Validator::make($request->all(),[
            'date'=>["required","date_format:Y-m-d"],
        ]);
        $schedule = Schedule::find($schedule);
        if ($validator->fails()||empty($schedule))abort(400);
        $sheets = Sheet::all()->toArray();
        foreach ($schedule->reservation as $reservation) {
            foreach ($sheets as $key=>$item) {
                if ($item["id"]===$reservation["sheet_id"])$sheets[$key]["reserved"] = true;
            }
        }
        $sheets = array_reduce($sheets,function (array $groups, $sheet) {
            $groups[$sheet["row"]][] = $sheet;
            return $groups;
        },[]);
        return view("sheetReserve",["sheets"=>$sheets]);
    }
    public function reserveCreate(Request $request){
        $validator = Validator::make($request->all(),[
            'date'=>["required","date_format:Y-m-d"],
            'sheetId'=>["required","numeric"],
        ]);
        if ($validator->fails())abort(400);
        return view("practice");
    }
    public function reserveStore(Request $request){
        $request->validate([
            'schedule_id'=>["required","numeric"],
            'sheet_id'=>["required","numeric"],
            'name'=>["required","string"],
            'email'=>["required","email:rfc,dns"],
            'date'=>["date","date_format:Y-m-d"],
        ]);
        try {
            $reserve = new Reservation();
            $reserve->screening_date=$request->date;
            $reserve->schedule_id = $request->schedule_id;
            $reserve->sheet_id = $request->sheet_id;
            $reserve->name = $request->name;
            $reserve->email = $request->email;
            $reserve->save();
        }catch (\Exception $e){
            return back();
        }
        return redirect("/");
    }
}

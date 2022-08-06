<?php
namespace App\Http\Controllers;
use App\Models\Reservation;
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
        if ($validator->fails())abort(400);
        return view("practice");
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

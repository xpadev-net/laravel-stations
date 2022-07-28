<?php
namespace App\Http\Controllers;
use App\Models\Sheet;
use Illuminate\Http\Request;

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
}

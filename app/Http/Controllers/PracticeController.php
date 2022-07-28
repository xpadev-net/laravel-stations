<?php
namespace App\Http\Controllers;
use App\Models\Practice;

class PracticeController extends Controller
{
    public function sample()
    {
        return view("practice");
    }

    public function sample2()
    {
        return view('practice2', ['testParam' => "practice2"]);
    }

    public function sample3()
    {
        return view('practice2', ['testParam' => "test"]);
    }

    public function getPractice()
    {
        $practice = Practice::all();
        return view('getPractice',['practices'=>$practice]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\ClassGroup;
use Illuminate\Http\Request;


class ClassController extends Controller
{
    //
    public function classDetail(Request $request){

        $class_id = $request->route('class_id');
        $class = ClassGroup::where('id', $class_id)->first();

        return view('pages.my-class', compact('class'));

    }
}

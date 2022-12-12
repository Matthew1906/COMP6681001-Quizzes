<?php

namespace App\Http\Controllers;
use App\Models\ClassGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClassController extends Controller
{
    //
    public function classDetail(Request $request){

        $data['title'] = 'Class Detail';
        $class_id = $request->route('class_id');
        $class = ClassGroup::where('id', $class_id)->first();

        return view('pages.my-class', compact('class'), $data);

    }

    public function classList(){

        $data['title'] = 'ClassList';
        $classList = ClassGroup::whereRelation('teachers', 'id', '=', Auth::id())->get();
        // dd($classList);
        return view('pages.my-classes', ['classList' => $classList]);
        // return view('pages.my-classes', compact('classList'));
    }

}

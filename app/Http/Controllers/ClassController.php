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
        if(Auth::user()->role->name=='student'){
            $role = 'students';
        }
        else{
            $role = 'teachers';
        }
        $classList = ClassGroup::whereRelation($role, 'id', '=', Auth::id())->paginate(1);
        return view('pages.my-classes', ['classList' => $classList]);
        // return view('pages.my-classes', compact('classList'));
    }

}

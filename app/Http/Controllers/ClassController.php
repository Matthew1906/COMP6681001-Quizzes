<?php

namespace App\Http\Controllers;
use App\Models\ClassGroup;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role->name=='student'){
            $role = 'students';
        }
        else{
            $role = 'teachers';
        }
        $classes = ClassGroup::whereRelation($role, 'id', '=', Auth::id())->paginate(5);
        return view('pages.classes.index', ['classes' => $classes]);
    }

    public function show($class_id)
    {
        $class = ClassGroup::where('id', $class_id)->first();
        return view('pages.classes.show', ['class'=>$class]);
    }

}

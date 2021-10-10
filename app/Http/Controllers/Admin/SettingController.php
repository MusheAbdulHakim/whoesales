<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $title = 'app settings';
        return view('admin.settings.index',compact(
            'title',
        ));
    }

    public function store(Request $request){
       //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $title = 'generate reports';
        return view('admin.reports.index',compact(
            'title'
        ));
    }
}

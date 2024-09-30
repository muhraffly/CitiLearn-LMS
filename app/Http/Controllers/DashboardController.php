<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index(){

        $courses = Course::all();
        return view('dashboard.indexDashboard', [
            "title" => 'Dashboard',
            'courses' => $courses
        ]);
    }
}

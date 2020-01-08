<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mycourses()
    {
        return view('frontend.pages.users.my-courses');
    }

    public function mypurchases()
    {
        return view('frontend.pages.users.purchase-history');
    }
    public function tutor()
    {
        return view('dashboard.tutors.courses');
    }
    public function tutor_courses()
    {
        return view('dashboard.tutors.courses');
    }
    public function tutortable()
    {
        return view('dashboard.tutors.tabledata');
    }

}

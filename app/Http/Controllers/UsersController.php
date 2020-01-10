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
    public function tutor_courses()
    {
        return view('dashboard.pages.tutors.courses');
    }
    public function tutortable()
    {
        return view('dashboard.pages.tutors.tabledata');
    }
    public function profile()
    {
        return view('frontend.pages.users.profile');
    }
    public function tutor_profile()
    {
        return view('dashboard.pages.tutors.tutor-profile');
    }
    public function create_course()
    {
        return view('dashboard.pages.tutors.create-course');
    }
public function messages()
    {
        return view('dashboard.pages.tutors.messages');
    }
public function tutor_review()
    {
        return view('dashboard.pages.tutors.review');
    }
public function tutor_dashboard()
    {
        return view('dashboard.pages.tutors.dashboard');
    }

}

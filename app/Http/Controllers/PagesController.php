<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function portfolio(){
        return view('frontend.pages.portfolio');
    }
    public function blog(){
        return view('frontend.pages.blog');
    }
    public function faq(){
        return view('frontend.pages.faq');
    }
    public function courses(){
        return view('frontend.pages.courses');
    }
    public function dashboard(){
        return view('dashboard.pages.index');
    }
    public function teach(){
        return view('frontend.pages.teach-on-tyen');
    }
}

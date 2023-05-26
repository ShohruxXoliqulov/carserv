<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function about(){
        return view('pages.about');
    }

    public function error(){
        return view('pages.error');
    }

    public function booking(){
        return view('pages.booking');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function services(){
        return view('pages.services');
    }

    public function technicians(){
        return view('pages.technicians');
    }

    public function testimonial(){
        return view('pages.testimonial');
    }



}

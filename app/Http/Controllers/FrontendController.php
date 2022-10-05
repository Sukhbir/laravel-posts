<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use Response;


class FrontendController extends Controller
    {

        public function index()
            {   
                               
                $data = Student::all(); 
                // return view('frontend.index', compact('data'));

                // $data = explode(',', $tags->tags);

                 return view('frontend.index',['data'=>$data]);
            
            }

    }

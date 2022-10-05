<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Response;

use App\Models\Student;

class EmailController extends Controller
{
     public function checkEmail(Request $request)
       {
           //return $request;
           $data = $request->all(); 
           $userCount = Student::where('email', $data['email']);
           
           if ($userCount->count() > 0) {
               return Response::json(array('msg' => 'true'));
           } else {
               return Response::json(array('msg' => 'false'));
           }
       }
}

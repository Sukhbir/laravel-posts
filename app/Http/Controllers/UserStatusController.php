<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Response;


class UserStatusController extends Controller
{
    public function userChangeStatus(Request $request) 

        { 

          
            $user = Student::find($request->user_id); 

            $user->status = $request->status; 

            $user->save(); 

    

            return response()->json(['success'=>'Status change successfully.',$user]); 

        } 
        
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Response;
use DataTables;
use auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
	// 	$data['students'] = Student::orderBy('id','desc')->paginate(5);   
    //     return view('student.list',$data);
    // }

public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Student::latest()->get();
           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Status', function($row){
   
                        $statuscheck = ($row->status) ? 'checked' : '';

                        $btn1 = '<label class="switch" id="txtbtn">
                        <input '.$statuscheck .' type="checkbox" data-id="'.$row->id.'"  class="toggle-class" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive">
                        <span class="slider round"></span>
                      </label>';
                       
                         return $btn1;
                   })
                  
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm btnEdit">Edit</a>';
                          
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm btnDelete show_confirm">Delete</a>';
                          
                          return $btn;
                    })
                    ->rawColumns(array("Status", "action"))
                    
                    ->make(true);
        }
            
       
        return view('student.list');
  }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
      {		 
           
         
            // if (!$request->has('image')) {
            //     return response()->json(['message' => 'Missing file'], 422);
            // }

            $imageName = time().'.'.$request->image->extension(); 
            $path = $request->image->move(('public/images'), $imageName);  
            

		     $student = new Student([
            'title' => $request->post('title'),
            'description'=> $request->post('description'),
            'image'=> $imageName,
            'path'=> $path,
            'author'=> $request->post('author'),
            'tags'=> $request->post('tags'),
 
         ]);
        $student->save();
        
        return response()->json(['success'=>'Detail saved successfully.']);

        
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$where = array('id' => $id);
        $student  = Student::where($where)->first();
        
        return Response::json($student);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {                  
       
        $imageName = time().'.'.$request->image->extension(); 
        $path = $request->image->move(('public/images'), $imageName);  


		$student = Student::find($request->post('hdnStudentId'));
        $student->title = $request->post('title');
        $student->description = $request->post('description');
         
        $student->image = $imageName;
        $student->path = $path;

        $student->author = $request->post('author');
        $student->update();
       
		return Response::json($student);
		
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
        
            $student = Student::where('id',$id)->delete();
            return Response::json($student);
        }
}
?>
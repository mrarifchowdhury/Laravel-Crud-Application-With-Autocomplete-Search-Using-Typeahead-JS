<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Validator;
use Session;

class StudentController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {

    $datas = Student::all();

    return view('student.index',compact('datas'));     
    
    // return response()->json($datas);
      
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
        $input  = $request->all();
        $validator = Validator::make($request->all(), [
                    'firstname' => 'required',
                ]);

        if($validator->fails()){
            Session::flash('flash_message','Please Fillup all Inputs.');
            return redirect()->back()->withErrors($validator)->withInput()->with('status_color','warning');
        }

        try{
            $bug=0;
            $insert= Student::create($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','New Data Successfully Saved !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    /**
     * Display the specified resource.''
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
        $data['editData'] = Student::findOrfail($id);
        return view('student.studentEditForm', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $data = Student::findOrfail($id);
        
        $validator = Validator::make($request->all(), [
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'gender' => 'required',
                    'city' => 'required', 
                    'country' => 'required',
                    'address' => 'required',
                ]);

        if($validator->fails()){
            $plainErrorText = "";
            $errorMessage = json_decode($validator->messages(), True);
            foreach ($errorMessage as $value) { 
                $plainErrorText .= $value[0].". ";
            }
            Session::flash('flash_message', $plainErrorText);
            return redirect()->back()->withErrors($validator)->withInput()->with('status_color','warning');
        }
                
        $input = $request->all();

        try{
          $bug=0;
          $data->update($input);
        }
        catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Information Successfully Updated !');
            return redirect()->route('student.index')->with('status_color','warning');
        }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        
        try{
          $bug=0;
          $action = $data->delete();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Data Successfully Deleted !');
            return redirect()->route('student.index')->with('status_color','danger');
        }
        else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
        }
    }

   
}

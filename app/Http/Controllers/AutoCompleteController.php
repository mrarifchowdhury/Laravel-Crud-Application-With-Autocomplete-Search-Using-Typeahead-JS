<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use DB;

class AutoCompleteController extends Controller
{
    public function index()
    {
        return view('search');
        
    }
 
    public function search(Request $request)
    {
        $search = $request->get('term');
     

        $fullName = Student::select(DB::raw("CONCAT(firstname,' ',lastname) AS name"))->get();
        $gender= Student::select( "gender  as name")->where('gender', 'LIKE', '%'. $search. '%')->get();
        $city= Student::select( "city  as name")->where('city', 'LIKE', '%'. $search. '%')->get();
        $address = Student::select('address as name')->where('address', 'LIKE', '%'. $search. '%')->get();
     
            // $firstname= Student::select( "firstname  as name")->where('firstname', 'LIKE', '%'. $search. '%')->get(); 
            // $lastname= Student::select( "lastname  as name")->where('lastname', 'LIKE', '%'. $search. '%')->get();

        
            // foreach($lastname as $key => $lname){
            //     $fullName[] = array("name" => $firstname[$key]['name'].' '.$lname['name'] );
            // }
          
        $result =  array_merge(json_decode(json_encode($fullName), true),
                                json_decode($gender, true), 
                                json_decode($city, true), 
                                json_decode($address, true));
            

        return response()->json($result);

            // print("<pre>".print_r($result,true)."</pre>");
            
    } 


    public function searchAction(Request $request)
    {
        $input  = $request->all();

        $result = Student::select('*')
                            ->where(DB::raw("CONCAT(firstname,' ',lastname)"), 'like', '%' .$input['search']. '%')
                            ->orWhere('Firstname', 'like', '%' .$input['search']. '%')
                            ->orWhere('gender', 'like', '%' .$input['search']. '%')
                            ->orWhere('city', 'like', '%'.$input['search'].'%' )
                            ->orWhere('address', 'LIKE', '%'. $input['search']. '%')
                            ->get();

        // return response()->json($result);

        return view('student.studentSearchResult',compact('result','input'));


    }
}

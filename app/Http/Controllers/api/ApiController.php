<?php

namespace App\Http\Controllers\api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{


        public function index(){
    

            $students=Student::all();

            return response()->json($students);

        }

        public function store(Request $request)
        {
            $validator=Validator::make($request->all(),[

                'name' =>'string',
                'age'  =>'integer'


            ]);


            if($validator->fails()){
                $data=[
                        'status' => '422',
                    'message'=>$validator->messages()

                ];

                return response()->json($data,422);
            }


            $data=Student::create([
                'name' =>$request->name,
                'age'=>$request->age,

            ]);
            // return response()->json($data ,200);
            return response()->json('the student stored successfully',200);


        }



}

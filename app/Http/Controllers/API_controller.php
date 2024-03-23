<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\practiseRequest;
use App\Models\History;
use App\Models\Practise;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\validation;
use GuzzleHttp\Psr7\Response;
use Illuminate\Validation\Rules\Enum;

class API_controller extends Controller
{
    public function firstApi(){
        return ["name"=>"Anil nayak","contact"=>"987675432","state"=>"Telangana"];
    }

    public function History_List(){
        
        return History::all();//find all the records as responce to api
    }
    
    public function List_ID($id=null){
        return $id ? History::where("Transaction_id",$id)->get() : History::all();//selecting the particular row using id 
    }

    public function CreateMethod(practiseRequest $request){
        return ["status:"=>"successfull"];
    }

    public function storemethod(Request $request){
        $validate=validator::make($request->all(),[
            'name' =>'required',
            'college' =>'required',
            'contact' => ['required','unique:practises','digits:10'],
            'state' => ['required']
        ]);

        if(!$validate->fails()){
            $result= Practise::create([
                    'name' => $request['name'],
                    'college' => $request['college'],
                    'contact' => $request['contact'],
                    'state' => $request['state'],
                   ]);
            if($result){
                return response()->json(["status"=>"data validation done inserted"]);
            }     
        }
        
        return response()->json($validate->messages(),400);
    }


    public function updatemethod(practiseRequest $request,$name){
        
        $result=Practise::where(['name'=>$name])->update ([//multiple duplicates updated at a time
            'name' => $request['name'],
            'college' => $request['college'],
            'contact' => $request['contact'],
            'state' => $request['state'],
        ]);
            if($result){
                return ["status"=>"data updated successfully"];
               }
               return ["status"=>"data not updated successfully"];
        }

        public function Deletedata(practiseRequest $request){

            $result=Practise::where("name",$request->name)->delete();

               if($result){
                    return ["status"=>"data deleted successfully"];
                   }
                   return ["status"=>"data not deleted successfully"];
            }
        
    public function createUser(Request $request){
       // dd("iam reaching here");
        $validated= Validator::make($request->all(),[
            'name'=>'required|min:10',
            'job'=>'required'
           ],[
            'name'=>'name dalo bhai',
            'job'=>'job dalo bhai',
           ]);
        
        if(!$validated->fails()){

            $url = "https://reqres.in/v1/api";

            $data = [
              "name" => $request['name'],
              "job" => $request['job']  
            ];
            
            $responce = Http::post($url.'/users'. $data);
            
            return $responce->json();
        }

        return response()->json($validated->messages(),400);
        
            // $response= Http::post("https://reqres.in/api/users");
            // return $response;
        }

        public function updateUser(Request $request,$id){

             $validated= Validator::make($request->all(),[
                 'name'=>'required|min:10',
                 'job'=>'required'
                ],[
                 'name'=>'name dalo bhai',
                 'job'=>'job dalo bhai',
                ]);
             
    
             if(!$validated->fails()){

                 $url = "https://reqres.in/api";
     
                 $data = [
                   "name" => $request['name'],
                   "job" => $request['job']  
                 ];
                 
                 $responce = Http::put($url.'/users'.'/'.$id,$data);
                 
                 return $responce->json();
             }
     
             return response()->json($validated->messages(),400);
             }

             public function patchUser(Request $request,$id){
              
                $validated= Validator::make($request->all(),[
                    'name'=>'required|min:10',
                    'job'=>'required'//trying to update the job
                   ],[
                    'name'=>'name is required bro',
                    'job'=>'job dalo bhai',
                   ]);
                   
                if(!$validated->fails()){
   
                    $url = "https://reqres.in/api";
        
                    $data = [
                      "name"=>$request['name'],
                      "job" => $request['job']  
                    ];
                    
                    $responce = Http::patch($url.'/users'.'/'.$id,$data);
                    
                    return $responce->json();
                }
        
                return response()->json($validated->messages(),400);
                }

                public function deleteUser(Request $request,$id){
                       // dd("iam reaching here");
                    // $validated= Validator::make($request->all(),[
                    //     'name'=>'required|min:10',
                    //     'job'=>'required'//trying to update the job
                    //    ],[
                    //     'name'=>'name is required bro',
                    //     'job'=>'job dalo bhai',
                    //    ]);
                       
                  //  if(!$validated->fails()){
       
                        $url = "https://reqres.in/api";
            
                        // $data = [
                        //   "name"=>$request['name'],
                        //   "job" => $request['job']  
                        // ];
                        
                        $responce = Http::delete($url.'/users'.'/'.$id);
                        
                        return $responce->json();
                  //  }
            
                   // return response()->json($validated->messages(),400);
                    }

             public function RegisterSuccess(Request $request){
                     //   dd("iam reachingh here");
                        // $validated= Validator::make($request->all(),[
                        //     'email'=>'required|email',
                        //     'password'=>'required|min:8'
                        //    ],[
                        //     'email'=>'email is required and type is email only',
                        //     'password'=>'password is required and type is password only',
                        //    ]);
                           
                        // if(!$validated->fails()){

                            $url = "https://reqres.in/api";
                
                            $data = [
                              "email"=>$request['email'],
                              "password" => $request['password']  
                            ];
                            
                            $responce = Http::post($url.'/register',$data);
                            
                        //    // return response($responce,200);
                        // }
                
                        return response()($responce,200);
                        }

}

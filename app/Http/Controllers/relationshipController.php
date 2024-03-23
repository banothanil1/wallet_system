<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AddressRelationship;
use App\Models\UserRelationship;
class relationshipController extends Controller
{
    public function insert_adress(){
       // dd("iam reaching here");
AddressRelationship::create([
            'user_id'=>1,
            'country' =>"india"
        ]);
         AddressRelationship::create([
            'user_id'=>10,
            'country'=>"pakistan"
        ]);
         AddressRelationship::create([
            'user_id'=>11,
            'country'=>"Aussies"
        ]);
         AddressRelationship ::create([
            'user_id'=>15,
            'country'=>"south africa"
        ]);
         AddressRelationship::create([
            'user_id'=>20,
            'country'=>"china"
        ]);

        echo "data inserted in adress";
    }

    public function insert_user(){
        UserRelationship::create([
            'name'=>"anil nayak" 	,
            'email'=>"banoth50@gmail.com",
         	'password'=>"83hdfk",
         	'remember_token'=>"lk4eori" 	
        ]);
        UserRelationship::create([
            'name'=>"anil nayak" 	,
            'email'=>"banoth50@gmail.com",
         	'password'=>"83hdfk",
         	'remember_token'=>"lk4eori" 	
        ]);
        UserRelationship::create([
            'name'=>"anil nayak" 	,
            'email'=>"banoth50@gmail.com",
         	'password'=>"83hdfk",
         	'remember_token'=>"lk4eori" 	
        ]);
        UserRelationship ::create([
            'name'=>"anil nayak" 	,
            'email'=>"banoth50@gmail.com",
         	'password'=>"83hdfk",
         	'remember_token'=>"lk4eori" 	
        ]);
        UserRelationship::create([
            'name'=>"anil nayak" 	,
            'email'=>"banoth50@gmail.com",
         	'password'=>"83hdfk",
         	'remember_token'=>"lk4eori" 	
        ]);

        echo "data inserted in user";
    }
}

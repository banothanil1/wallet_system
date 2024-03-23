<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\validation;
use App\Http\Requests\Add_Money_Validation;
use  App\Http\Requests\Transfer_Money_validation;
use  App\Http\Requests\withdraw_Money_validation;
use Illuminate\Http\Request;
use App\Http\Requests\loginform;
use  App\Models\User;
use  App\services\historyService;
use App\Models\History;
class usercontroller extends Controller
{
    public function homepage(){
        return view ('homepage');
    }

    public function registerform(){
        return view('Registrationform');
    }

    public function register(validation $request){
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phno' => $request->input('phno'),
            'password' => Hash::make($request->input('password')),
            'Balence' => $request->input('Balence')
        ]);
        echo "Your registration was successful";
    }

    public function loginform(){//loginr form 
        return view('loginform');
    }

    public function login(loginform $request){//credential checking 
        $user = User::where('name', $request['name'])->first();
        if ($user && Hash::check($request['password'], $user['password'])) {

            session()->push('name',$request['name']);//starting session as enter into application
            session()->push('password',$request['password']);

            $data=compact('user');
            return view('after_login_succ')->with($data);
        } else {
            echo "incorrect name or password";
        }
    }

    public function logout(){
            if(session()->has('name') && session()->has('password')){
                session()->remove('name');
                session()->remove('password');
                return view ('loginform');
            }
    }

    public function AddMoneyForm($user){  //its a form controller
        $userdata=compact('user');
        if(session()->has('name') && session()->has('password')){
            return view('Add_Money_Form')->with($userdata);
        }
        else{
            echo "you cannot add money please Login";
        }
    }
    

    public function addMoney(Add_Money_Validation $request,$userId)
    {
        // Retrieve the user by ID
        $user = User::find($userId);

        if ($user && session()->has('name') && session()->has('password')) {
            $newBalance = $user->Balence + $request->input('amount');//balence getting updated
            $user->update(['Balence' => $newBalance]);
            
            //adding user history to history table);

            // Add user history to histories table
            $historyData = historyService::Add_Money_History($user, $request); // Get history data

            // Create a new history record
            History::create($historyData);
            
            $data=compact('user');

            
            return view('after_login_succ')->with($data);//returning back to balance after succesfull transfer 
        } 
        else {
            return "User not found or invalid session.";
        }
    }

    public function TransferMoneyForm($user){  //its a form controller
        $userdata=compact('user');
        if(session()->has('name') && session()->has('password')){
            return view('Transfer_Money_Form')->with($userdata);
        }
        else{
            echo "you cannot Transfer money please Login";
        }
    }
    
    public function TransferMoney(Transfer_Money_validation $request, $userId)
    {
        $user = User::find($userId);
        $recipient=User::where("name",$request->input('recipientName'))->first();//finding reciepient row

     if ($user  && $recipient && session()->has('name') && session()->has('password')) {//checing session is alive
                
        if($user->Balence>=$request->input('amount')){//checking if amount>existing amount
            
            if($user->name==$request->input('recipientName')){//checking if transfer made to self acount
                return "cannot transfer to your own account";
            }
            
            $user_newBalance = $user->Balence - $request->input('amount');
            $recip_new_Balance=$recipient->Balence + $request->input('amount');

            $user->update(['Balence' => $user_newBalance]);//updating user amount
            $recipient->update(['Balence' => $recip_new_Balance]);//updating reciepient amount

             // Add user history to histories table
            $historyDatasend = historyService::Transfer_Money_Histroy_Sender($user, $request); // Get history data
            $historyDatarec = historyService::Transfer_Money_Histroy_Reciever($user, $recipient,$request); // Get history data
            // Create a new history record of both sender and reciever
            History::create($historyDatasend);
            History::create($historyDatarec);

            $data=compact('user');

            return view('after_login_succ')->with($data);//returning back to balance after succesfull transfer
            }
            else{
               return "your transfer amount is greater than existing amount";
            }
        } 
        else {
            return "User not found or invalid session.";
        }

    }


    //history function

    public function history($user){
        $userHistory =History::where('Transaction_id',$user)->get();
        $data=compact('userHistory');
        return view('history')->with($data);
    }

    public function WithdrawMoneyForm($user){  //its a form controller
        $userdata=compact('user');
        if(session()->has('name') && session()->has('password')){
            return view('Withdraw_Money_Form')->with($userdata);
        }
        else{
            echo "you cannot Withdraw money please Login";
        }
    }

    public function WithdrawMoney(withdraw_Money_Validation $request,$userId){
            // Retrieve the user by ID
            $user = User::find($userId);
    
            if ($user && session()->has('name') && session()->has('password')) {
                $newBalance = $user->Balence - $request->input('amount');//balence getting updated
                $user->update(['Balence' => $newBalance]);
    
                // Add user history to histories table
                $historyData = historyService::Withdraw_Money_History($user, $request); // Get history data
    
                // Create a new history record
                History::create($historyData);
                
                $data=compact('user');
    
                return view('after_login_succ')->with($data);//returning back to balance after succesfull transfer 
            } 
            else {
                return "User not found or invalid session.";
            }
        }

    }

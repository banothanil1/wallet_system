<?php
 Namespace App\services;
 class historyService{
        public static function Add_Money_History($user,$request){
           return[ 
            'Transaction_id'=>$user->id,
            'Name'=>$user->name,
            'Phno'=>$user->phno,
            'Credit_from'=>$user->name,
            'Credit_Amount'=>$request['amount'],
            'Debit_to'=> null,	
            'Debit_Amount'=>null, 	
            'Existing_Amount'=>$user->Balence, 	
            'Total_Balance'=> $user->Balence + $request['amount']
           ];
        }

        public static function Withdraw_Money_History($user,$request){
         return[ 
          'Transaction_id'=>$user->id,
          'Name'=>$user->name,
          'Phno'=>$user->phno,
          'Credit_from'=>null,
          'Credit_Amount'=>null,
          'Debit_to'=> null,	
          'Debit_Amount'=>$request->input('amount'), 	
          'Existing_Amount'=>$user->Balence + $request->input('amount'), 	
          'Total_Balance'=> $user->Balence ,
         ];
      }

        public static function Transfer_Money_Histroy_Sender($user,$request){
               return[
               'Transaction_id'=>$user->id,
                'Name'=>$user->name,
                'Phno'=>$user->phno,
                'Credit_from'=>null,
                'Credit_Amount'=>null,
                'Debit_to'=>$request->input('recipientName'),	
                'Debit_Amount'=>$request->input('amount'), 	
                'Existing_Amount'=>$user->Balence+$request->input('amount'), 	//this is after user balence updated in users table
                'Total_Balance'=> $user->Balence,
               ];
            }
      
            public static function Transfer_Money_Histroy_Reciever($user,$recipient,$request){
               return[
               'Transaction_id'=>$recipient->id,
                'Name'=>$recipient->name,
                'Phno'=>$recipient->phno,
                'Credit_from'=>$user->name,
                'Credit_Amount'=>$request->input('amount'),
                'Debit_to'=>null,
                'Debit_Amount'=>null, 	
                'Existing_Amount'=>$recipient->Balence - $request->input('amount'), 	
                'Total_Balance'=> $recipient->Balence,
               ];
            }

 }
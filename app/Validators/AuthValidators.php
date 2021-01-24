<?php

namespace App\Validators;

use Validator;


class AuthValidators 
{


    public function loginValidator($request)
    {
      
    }

    public function hasFriendValidators($request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_friend' => 'required',
        ]);
    
        if ($validator->fails()) {
            return false;
        }else{
            return true;
        }
    }
}
<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController {

    function show($id) {
        $user = User::find($id);

        if (!is_null($user)) {
            return ["status" => true, "data" => $user];
        }else {
            return ["status" => false, "data" => null];
        }
    }

    function login(Request $request) {
        $phone = $request->phone;
        
        $user = User::where('phone', $phone)->first();

        if (!is_null($user)) {
            return ["status" => true, "data" => $user];
        }else {
            return ["status" => false, "data" => null];
        }
    }

    function register(Request $request) {
        
        try {
            $user = new User();
            $user->user_type = $request->user_type;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->identity = $request->identity;
            $user->register_number = $request->register_number;
            $user->email = $request->email;
            $user->save();
            return ["status" => true, "data" => $user];

        }catch (\Exception $e) {
            return ["status" => false, "data" => null, "message" => $e];
        }
       
    }

    function sendSMS(Request $request) {
        $phone = $request->phone;
        $message = $request->message;
        
        $response = Http::asForm()->post('https://ajarksa.com/ajar', [
            'phone' => $phone,
            'message' => $otp,
        ]);

        return $response;
    }

    function update(Request $request) {
        try {
            $user = User::find($request->id);

            $user->name = $request->name;
            $user->contact = $request->contact;
            $user->register_number = $request->register_number;
            $user->identity = $request->identity;
            $user->email = $request->email;
            $result = $user->save();

            if ($result) {
                return ["status" => true, "data" => $user];
            }else {
                return ["status" => false, "data" => null];
            }
        }catch(\Exception $e) {
            return ["status" => false, "data" => null];
        }
    }


    function delete(Request $request) {
        try {
            $user = User::find($request->id);
            $user->phone = "deleted.".$user->phone;
            $user->is_deleted = 1;
            $result = $user->save();

            if ($result) {
                return ["status" => true, "data" => $user];
            }else {
                return ["status" => false, "data" => null];
            }
        }catch(\Exception $e) {
            return ["status" => false, "data" => null];
        }

    }
}
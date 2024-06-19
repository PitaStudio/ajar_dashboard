<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BlackList;

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

    function AddToBlackList(Request $request) {
        try {
            $user = new BlackList();

            $user->user_id = $request->user_id;
            $user->phone = $request->phone;
            $user->save();
            
            return ["status" => true, "data" => $user];
            
        }catch(\Exception $e) {
            return ["status" => false, "data" => null];
        }

    }

    function removeFromBlackList(Request $request) {
        try {
            $user = BlackList::where('user_id', $request->user_id)->where('phone', $request->phone)->first();
            $user->delete();
            
            return ["status" => true, "data" => $user];
            
        }catch(\Exception $e) {
            return ["status" => false, "data" => null];
        }

    }

    function blackList($id) {
        $users = BlackList::where("user_id", $id)->get();

        if (!is_null($users)) {
            return ["status" => true, "data" => $users];
        }else {
            return ["status" => false, "data" => null];
        }
    }
}
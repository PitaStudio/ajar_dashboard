<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Http;
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
        $otp_code = $request->message;

        $app_id = "294316390431949";
        $app_token  = "EAATQkpeorOQBO8SSrZA4v7TNbnGKLt3nZCmbPtFcDVAClNSle07ju1dNcFkuUbanHISCNLiEUVKGOYwnvQma7iNltZCaKX5dqdNCTFQZApMe5JfOmXCJGfgOZAZBCZBB6EUO8pdMLfsMZB8DO37RQvnmbUL3G1HdoZCNNkqMQZAmvx9Fa1MO0bVyRqZB57MIEVlERt0";
        $templateName = "otp";
        
        // $otp_code = $_REQUEST['message'];
        // $phone = $_REQUEST['phone'];
        
        $messages = [];
        $messages["messaging_product"] = "whatsapp";
        $messages["to"] = $phone;
        $messages["recipient_type"] = "individual";
        $messages["type"] = "template";
        $messages["template"]["name"] = $templateName;
        $messages["template"]["language"] = ["code" => "en_US"];
        $messages["template"]["components"][] = ["type" => "body", "parameters" => [["type"=> "text",
        "text" => $otp_code]]];
        $messages["template"]["components"][] = ["type" => "button","sub_type" => "url","index" => "0", 
        "parameters" => [["type"=> "text",
        "text" => $otp_code]]];
    
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$app_token
        ])->asForm()->post('https://graph.facebook.com/v19.0/'.$app_id.'/messages', $messages);

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
            $user->reason = $request->reason;
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
        $users = BlackList::where("user_id", $id)->orderBy('id', 'DESC')->get();

        if (!is_null($users)) {
            return ["status" => true, "data" => $users];
        }else {
            return ["status" => false, "data" => null];
        }
    }

    function findInBlackList($number) {
        $user = BlackList::with(["user"])->where("phone", $number)->first();

        if (!is_null($user)) {
            return ["status" => true, "data" => $user];
        }else {
            return ["status" => false, "data" => null];
        }
    }
}
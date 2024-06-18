<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Add;
use App\Models\Region;
use App\Models\City;
use App\Models\Contact;

class AddsController {

    function adds($user_id = null) {
        try {
            $adds = Add::with(["region", "city", "user", "category"])->get();
            return ["status" => true, "data" => $adds];
        }catch(\Exception $e) {
            return ["status" => false, "data" => null, "error" => $e];
        }
    }

    function myAdds($user_id) {
        try {
            $adds = Add::with(["region", "city", "user", "category"])->where("user_id", $user_id)->get();
            return ["status" => true, "data" => $adds];
        }catch(\Exception $e) {
            return ["status" => false, "data" => null, "error" => $e];
        }
    }

    function createContact(Request $request) {
        try {
            $contact = new Contact();
            $contact->add_id = $request->add_id;
            $contact->user_id = $request->user_id;
            $contact->booking_days = $request->booking_days;
            $contact->contact_with = $request->contact_with;
            $contact->save();
            return ["status" => true, "data" => $contact];
        }catch (\Exception $e) {
            return ["status" => false, "data" => null, "message" => $e];
        }
    }

    function createNewAdd(Request $request) {
        try {
            $carImage = "";

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('assets/images/'.$request->photo));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('assets/images'),$fileName);
                $carImage = $fileName;
            }
            $add = new Add();
            $add->user_id = $request->user_id;
            $add->type = $request->type;
            $add->image = $carImage;
            $add->title = $request->name;
            $add->region_id = $request->region_id;
            $add->city_id = $request->city_id;
            $add->category_id = $request->category_id;
            $add->car_type = $request->car_type;
            $add->size = $request->size;
            $add->model = $request->model;
            $add->price = $request->price;
            $add->address = $request->address;
            $add->details = $request->details;
            $add->save();
            return ["status" => true, "data" => $add];
        }catch (\Exception $e) {
            return ["status" => false, "data" => null, "message" => $e];
        }
    }

}
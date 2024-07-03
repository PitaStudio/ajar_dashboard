<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Add;
use App\Models\AddImage;
use App\Models\Region;
use App\Models\City;
use App\Models\Contact;

class AddsController {

    function adds($user_id = null) {
        try {
            $adds = Add::with(["region", "city", "user", "category", "images"])->orderBy('id', 'DESC')->get();
            return ["status" => true, "data" => $adds];
        }catch(\Exception $e) {
            return ["status" => false, "data" => null, "error" => $e];
        }
    }

    function myAdds($user_id) {
        try {
            $adds = Add::with(["region", "city", "user", "category", "images"])->where("user_id", $user_id)->where("is_deleted", 0)->orderBy('id', 'DESC')->get();
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

            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            if ($request->file('images')) {
                $files = $request->file('images');
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                // shuffle the result
                $string = str_shuffle($pin);

                @unlink(public_path('assets/images/'.$request->photo));
                $fileName = date('YmdHis').'_'.$string.'_'.$files[0]->getClientOriginalName();
                $files[0]->move(public_path('assets/images'),$fileName);
                $carImage = $fileName;
                unset($files[0]);
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

            $image = new AddImage();
            $image->add_id = $add->id;
            $image->image = $carImage;
            $image->save();
            
            
            foreach ($files as $file) {
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                // shuffle the result
                $string = str_shuffle($pin);
                
                $fileName = date('YmdHis').'_'.$string.'_'.$file->getClientOriginalName();
                
                $file->move(public_path('assets/images'),$fileName);
                $carImage = $fileName;
                

                $image = new AddImage();
                $image->add_id = $add->id;
                $image->image = $carImage;
                $image->save();
            }

            return ["status" => true, "data" => $add];
        }catch (\Exception $e) {
            return ["status" => false, "data" => null, "message" => $e];
        }
    }

    function delete($id) {
        try {
            $add = Add::find($id);
            
            $add->is_deleted = 1;
            $result = $add->save();

            if ($result) {
                return ["status" => true, "data" => $add];
            }else {
                return ["status" => false, "data" => null];
            }
        }catch(\Exception $e) {
            return ["status" => false, "data" => null];
        }
    }

    function update(Request $request) {
        try {
            $carImage = "";
            $hasNewImage = false;
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            if ($request->file('images')) {
                $files = $request->file('images');
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                // shuffle the result
                $string = str_shuffle($pin);
                @unlink(public_path('assets/images/'.$request->photo));
                $fileName = date('YmdHis').'_'.$string.'_'.$files[0]->getClientOriginalName();
                $files[0]->move(public_path('assets/images'),$fileName);
                $carImage = $fileName;
                unset($files[0]);
            }

            $add = Add::find($request->id);
            
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

            AddImage::where("add_id", $request->id)->delete();

            foreach ($request->images as $image) {
                @unlink(public_path('assets/images/'.$image));
            }

            $image = new AddImage();
            $image->add_id = $add->id;
            $image->image = $carImage;
            $image->save();
            
            foreach ($files as $file) {
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                // shuffle the result
                $string = str_shuffle($pin);
                
                $fileName = date('YmdHis').'_'.$string.'_'.$file->getClientOriginalName();
                
                $file->move(public_path('assets/images'),$fileName);
                $carImage = $fileName;
                

                $image = new AddImage();
                $image->add_id = $add->id;
                $image->image = $carImage;
                $image->save();
            }


            return ["status" => true, "data" => $add];
        }catch (\Exception $e) {
            return ["status" => false, "data" => null, "message" => $e];
        }
    }

    function reviewAdd(Request $request) {
        try {
            $contact = Contact::where("add_id", $request->add_id)->where("user_id", $request->user_id)->first();
            
            if($contact) {
                $contact->status = $request->status;
                $contact->user_review = $request->review;
                $contact->save();
                return ["status" => true, "data" => $contact];
            }else {
                return ["status" => false, "data" => null];
            }
            
        }catch (\Exception $e) {
            return ["status" => false, "data" => null, "message" => $e];
        }
    }

}
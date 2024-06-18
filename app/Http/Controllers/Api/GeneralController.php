<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Region;
use App\Models\City;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\InquiriesList;

class GeneralController {

    function about() {
        $about = About::first();
        return ["status" => true, "about" => $about];
    }

    function home() {
        $regions = Region::with(["cities"])->get();
        $banners = Banner::with(["add", "add.region", "add.city", "add.user", "add.category"])->get();
        $categories =  Category::get();
        return ["status" => true, "regions" => $regions, "banners" => $banners, "categories" => $categories];
    }

    function regions() {
        $regions = Region::with(["cities"])->get();
        return ["status" => true, "data" => $regions];
    }

    function inquiries() {
        $inquiries = Inquiry::get();
        return ["status" => true, "data" => $inquiries];
    }

    function addInquery(Request $request) {
        try {
            $inquiry = new InquiriesList();
            $inquiry->inquiry_id = $request->inquiry_id;
            $inquiry->mobile = $request->mobile;
            $inquiry->query_text = $request->query_text;
            $inquiry->note = $request->note;
            $inquiry->save();
            return ["status" => true, "data" => $inquiry];
        }catch (\Exception $e) {
            return ["status" => false, "data" => null, "message" => $e];
        }
    }

    function banners() {
        $banners = Banner::get();
        return ["status" => true, "data" => $banners];
    }
    
    function categories() {
        $categories = Category::get();
        return ["status" => true, "data" => $categories];
    }

}
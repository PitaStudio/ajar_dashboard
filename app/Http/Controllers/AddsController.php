<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Models\Add;
use App\Models\Category;
use App\Models\City;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class AddsController extends Controller
{
    public function index()
    {
        $data = Add::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        $regions = Region::where('is_deleted', 0)->get();
        $users = User::where('is_deleted', 0)->get();
        $cities = City::where('is_deleted', 0)->get();
        $categories = Category::where('is_deleted', 0)->get();
        return view('adds.index',compact('data','regions','users','cities','categories'));
    }

    public function store(AddRequest $request)
    {
        try
        {
            $adds = new Add();
            $adds->image = $this->UploadImage('assets/images',$request->image);
            $adds->type = $request->type;
            $adds->title = $request->title;
            $adds->user_id = $request->user_id;
            $adds->city_id = $request->city_id;
            $adds->region_id = $request->region_id;
            $adds->category_id = $request->category_id;
            $adds->car_type = $request->car_type;
            $adds->model = $request->model;
            $adds->size = $request->size;
            $adds->price = $request->price;
            $adds->address = $request->address;
            $adds->details = $request->details;
            $adds->region_id = $request->region_id;
            $adds->save();
            // toastr()->success('تم اضافه البانات بنجاح','نجاح');

            return redirect()->route('adds.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(AddRequest $request, $id)
    {
        try{
            $adds = Add::findOrFail($id);
            if($request->hasFile('image'))
            {
                $adds->image = $this->UploadImage('assets/images',$request->image);
            }
            $adds->type = $request->type;
            $adds->title = $request->title;
            $adds->user_id = $request->user_id;
            $adds->city_id = $request->city_id;
            $adds->region_id = $request->region_id;
            $adds->category_id = $request->category_id;
            $adds->car_type = $request->car_type;
            $adds->model = $request->model;
            $adds->size = $request->size;
            $adds->price = $request->price;
            $adds->address = $request->address;
            $adds->details = $request->details;
            $adds->region_id = $request->region_id;
            $adds->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('adds.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Add::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('adds.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

    function uploadImage($folder,$image)
    {
        $fileExtension = $image->getClientOriginalExtension();
        $fileName = time().rand(1,99).'.'.$fileExtension;
        $image->move($folder,$fileName);

        return $fileName;
    }//end of uploadImage
}

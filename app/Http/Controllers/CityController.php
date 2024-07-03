<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $data = City::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        $regions = Region::where('is_deleted', 0)->get();
        return view('city.index',compact('data','regions'));
    }

    public function store(CityRequest $request)
    {
        try {
            $city = new City();
            $city->name = $request->name;
            $city->region_id = $request->region_id;
            $city->save();
            // toastr()->success('تم اضافه البانات بنجاح','نجاح');

            return redirect()->route('city.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function update(CityRequest $request, $id)
    {
        try{
            $city = City::findOrFail($id);
            $city->name = $request->name;
            $city->region_id = $request->region_id;
            $city->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('city.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        public function delete($id)
    {
        $data = City::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('city.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

}

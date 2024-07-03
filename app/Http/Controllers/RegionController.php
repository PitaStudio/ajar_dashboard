<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionRequest;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $data = Region::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        return view('region.index',compact('data'));
    }

    public function store(RegionRequest $request)
    {
        try {
            $region = new Region();
            $region->name = $request->name;
            $region->save();
            // toastr()->success('تم اضافه البانات بنجاح','نجاح');

            return redirect()->route('region.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function update(RegionRequest $request, $id)
    {
        try{
            $data = Region::findOrFail($id);
            $data->name = $request->name;
            $data->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('region.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        public function delete($id)
    {
        $data = Region::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('region.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Add;
use App\Models\Banner;
use App\Models\Offer;
use App\Models\Region;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function index()
    {
        $data = Banner::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        $regions = Region::where('is_deleted', 0)->get();
        $adds = Add::where('is_deleted', 0)->get();
        return view('banners.index',compact('data','regions','adds'));
    }

    public function store(BannerRequest $request)
    {
        try
        {
            $banners = new Banner();
            $banners->image = $this->UploadImage('assets/banners',$request->image);
            $banners->region_id = $request->region_id;
            $banners->add_id = $request->add_id;
            $banners->save();
            // toastr()->success('تم اضافه البانات بنجاح','نجاح');

            return redirect()->route('banners.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(BannerRequest $request, $id)
    {
        try{
            $banners = Banner::findOrFail($id);
            if($request->hasFile('image'))
            {
                $banners->image = $this->UploadImage('assets/banners',$request->image);
            }
            $banners->region_id = $request->region_id;
            $banners->add_id = $request->add_id;
            $banners->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('banners.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Banner::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('banners.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

    function uploadImage($folder,$image)
    {
        $fileExtension = $image->getClientOriginalExtension();
        $fileName = time().rand(1,99).'.'.$fileExtension;
        $image->move($folder,$fileName);

        return $fileName;
    }//end of uploadImage

}

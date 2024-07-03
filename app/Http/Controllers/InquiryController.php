<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Models\InquiriesList;
use App\Models\Inquiry;
use App\Models\Region;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $data = Inquiry::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        return view('inquiry.index',compact('data'));
    }

    public function inquiry_list()
    {
        $data = InquiriesList::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        return view('inquiry.inquiry_list',compact('data'));
    }

    public function store(InquiryRequest $request)
    {
        try {
            $inquiry = new Inquiry();
            $inquiry->name = $request->name;
            $inquiry->save();
            // toastr()->success('تم اضافه البانات بنجاح','نجاح');

            return redirect()->route('inquiry.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function update(InquiryRequest $request, $id)
    {
        try{
            $inquiry = Inquiry::findOrFail($id);
            $inquiry->name = $request->name;
            $inquiry->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('inquiry.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        public function delete($id)
    {
        $data = Inquiry::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('inquiry.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

}

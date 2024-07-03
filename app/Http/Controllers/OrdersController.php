<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrdersController extends Controller
{
    public function index()
    {
        $data = Contact::select()->orderBy('id', 'DESC')->get();
        return view('orders.index',compact('data'));
    }

    public function store(OrderRequest $request)
    {
        try
        {
            $orders = new Contact();
            $orders->image = $this->UploadImage('assets/image/orders',$request->image);
            $orders->count_image = $this->UploadImage('assets/image/orders',$request->count_image);
            $orders->service_type = $request->service_type;
            $orders->title = $request->title;
            $orders->count = $request->count;
            $orders->unit_price = $request->unit_price;
            $orders->amount = $request->amount;
            $orders->details = $request->details;
            $orders->is_open_for_use = $request->is_open_for_use;
            $orders->duration = $request->duration;
            $orders->save();
            // toastr()->success('تم اضافه البانات بنجاح','نجاح');

            return redirect()->route('orders.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function update(OrderRequest $request, $id)
    {
        try{
            $orders = Contact::findOrFail($id);
            if($request->hasFile('image'))
            {
                $orders->image = $this->UploadImage('assets/image/orders',$request->image);
            }
            if($request->hasFile('image'))
            {
                $orders->count_image = $this->UploadImage('assets/image/orders',$request->count_image);
            }
            $orders->service_type = $request->service_type;
            $orders->title = $request->title;
            $orders->count = $request->count;
            $orders->unit_price = $request->unit_price;
            $orders->amount = $request->amount;
            $orders->details = $request->details;
            $orders->is_open_for_use = $request->is_open_for_use;
            $orders->duration = $request->duration;
            $orders->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('orders.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = Contact::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('orders.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

    public function searchAjax(Request $request)
    {
        $begin_date = $request->begin_date;
        $last_date = $request->last_date;

        if($request->ajax())
        {
            $data = Contact::whereBetween('created_at',[Carbon::parse($begin_date)
                ->format('Y-m-d 00:00:00'),Carbon::parse($last_date)
                ->format('Y-m-d 23:59:59')])->orderBy('id', 'DESC')->get();
            $count = count($data);

            // $total = $data->sum('bill_total');


            return view('orders.ajaxSearch',
            [
                'data'=>$data,
                'count'=>$count,
                'whatsapp'=>count($data->where('contact_with',2)),
                'call'=>count($data->where('contact_with',1)),
                // 'total'=>count($data->add->price),
            ]);

        }//end if

    }//end of search_ajax

    function uploadImage($folder,$image)
    {
        $fileExtension = $image->getClientOriginalExtension();
        $fileName = time().rand(1,99).'.'.$fileExtension;
        $image->move($folder,$fileName);

        return $fileName;
    }//end of uploadImage

}

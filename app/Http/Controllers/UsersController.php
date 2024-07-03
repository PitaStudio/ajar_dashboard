<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        return view('users.index',compact('data'));
    }

    public function store(UsersRequest $request)
    {
        try {
            $user = new User();
            $user->image = $this->UploadImage('assets/images',$request->image);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->identity = $request->identity;
            $user->contact = $request->contact;
            $user->user_type = $request->user_type;
            $user->save();

            // toastr()->success('تم اضافه البانات بنجاح','نجاح');
            return redirect()->route('users.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function update(UsersRequest $request, $id)
    {
        try{
            $user = User::findOrFail($id);
            if($request->hasFile('image'))
            {
                $user->image = $this->UploadImage('assets/images',$request->image);
            }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->identity = $request->identity;
            $user->contact = $request->contact;
            $user->user_type = $request->user_type;
            $user->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('users.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('users.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

    public function user_cars($id)
    {
        $data = User::findOrFail($id);
        $cars = $data->cars->where('is_deleted',0);
        $user_id = $id;
        return view('users.cars',compact('cars','user_id'));
    }


    function uploadImage($folder,$image)
    {
        $fileExtension = $image->getClientOriginalExtension();
        $fileName = time().rand(1,99).'.'.$fileExtension;
        $image->move($folder,$fileName);

        return $fileName;
    }//end of uploadImage


}

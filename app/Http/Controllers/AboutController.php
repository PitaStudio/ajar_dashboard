<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::select()->get();
        return view('about.index',compact('data'));
    }

    public function update(Request $request ,$id)
    {
        $validated = $request->validate([
            'phone'=> 'required',
            'whatsapp'=> 'required',
            'instagram'=> 'required',
            'snapchat'=> 'required',
            'twitter'=> 'required',
            'about'=> 'required',
            'tax'=> 'required'
        ]);
        $data = About::findOrFail($id);

        $data->phone = $request->phone;
        $data->whatsapp = $request->whatsapp;
        $data->instagram = $request->instagram;
        $data->snapchat = $request->snapchat;
        $data->twitter = $request->twitter;
        $data->about = $request->about;
        $data->tax = $request->tax;

        $data->update();

        return redirect()->route('about.index')->with(['success'=>'تم تعديل البانات بنجاح']);

    }
}

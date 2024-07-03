<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Category::where('is_deleted', 0)->select()->orderBy('id', 'DESC')->get();
        return view('category.index',compact('data'));
    }
    public function store(CategoryRequest $request)
    {
        try {
            $city = new Category();
            $city->name = $request->name;
            $city->save();
            // toastr()->success('تم اضافه البانات بنجاح','نجاح');

            return redirect()->route('categories.index')->with(['success'=>'تم اضافه البانات بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function update(CategoryRequest $request, $id)
    {
        try{
            $city = Category::findOrFail($id);
            $city->name = $request->name;
            $city->update();
            // toastr()->success('تم تعديل البانات بنجاح','نجاح');
            return redirect()->route('categories.index')->with(['success'=>'تم تعديل البانات بنجاح']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

        public function delete($id)
    {
        $data = Category::findOrFail($id);
        $data->update([
            'is_deleted'=>1
        ]);
        // toastr()->error('تم حذف البانات بنجاح','نجاح');
        return redirect()->route('categories.index')->with(['success'=>'تم حذف البانات بنجاح']);
    }

}


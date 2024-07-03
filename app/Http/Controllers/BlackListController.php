<?php

namespace App\Http\Controllers;

use App\Models\BlackList;
use Illuminate\Http\Request;

class BlackListController extends Controller
{
    public function index()
    {
        $data = BlackList::select()->get();
        return view('black_list.index',compact('data'));
    }
}

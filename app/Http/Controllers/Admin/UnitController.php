<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function unitAdd()
    {
        return view("admin.unit.add");
    }

    public function newUnit(Request $request)
    {
        Unit::newUit($request);
        return redirect()->back()->with("message", "Create Unit Successfully");
    }
}

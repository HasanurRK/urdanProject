<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function addBrand()
    {
        return view("admin.brand.add");
    }
    public function newBrand(Request $request)
    {
        Brand::newBrand($request);
        return redirect()->back()->with("message", "Brand save Successfully");
    }
}

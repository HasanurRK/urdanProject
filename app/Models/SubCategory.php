<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;


    protected $fillable = ["category_id", "name", "description", "image", "status"];

    protected static $subcategory;
    protected static $subCategoryImage;
    protected static $imageDirectory;
    protected static $imageName;
    protected static $imageUrl;

    public static function saveImage($request)
    {
        self::$subCategoryImage = $request->file("image");
        self::$imageName    = "sub-category-image".time().".".self::$subCategoryImage->getClientOriginalExtension();
        self::$imageDirectory = "sub-category-image/";
        self::$subCategoryImage->move(self::$imageDirectory, self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }
    public static function newSubCategory($request)
    {
        self::$subcategory = new SubCategory();
        self::$subcategory->category_id     = $request->category_id;
        self::$subcategory->name            = $request->name;
        self::$subcategory->description     = $request->description;
        self::$subcategory->image           = self::saveImage($request);
        self::$subcategory->status          = $request->status;
        self::$subcategory->save();
    }

    public static function updateSubCategory($request)
    {
        self::$subcategory = Category::find($request->category_id);
        if($request->hasFile("image"))
        {
            if(file_exists(self::$subcategory->image))
            {
                unlink(self::$subcategory->image);
            }
            self::$imageUrl = self::saveImage($request);
        } else {
            self::$imageUrl = self::$subcategory->image;
        }
        self::$subcategory->category_id    = $request->sub_category_id;
        self::$subcategory->name           = $request->name;
        self::$subcategory->description    = $request->description;
        self::$subcategory->image          = self::$imageUrl;
        self::$subcategory->status         = $request->status;
        self::$subcategory->save();
    }

    public function category()
    {
        return $this->belongsTo("App\Models\Category");
//        return $this->belongsTo(Category::class);
    }
}

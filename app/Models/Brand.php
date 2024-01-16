<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected static $brand;
    protected static $brandImage;
    protected static $imageName, $imageDirectory;

    public static function saveImage($request)
    {
        self::$brandImage = $request->file("image");
        self::$imageName    = "brand-image".time().".".self::$brandImage->getClientOriginalExtension();
        self::$imageDirectory = "brand-image/";
        self::$brandImage->move(self::$imageDirectory, self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }
    public static function newBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name   = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image  = self::saveImage($request);
        self::$brand->status = $request->status;
        self::$brand->save();
    }
}

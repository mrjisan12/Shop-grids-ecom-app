<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $SubCategory, $image,$imageExtension, $imageURL, $imageName, $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension(); //png
        self::$imageName = time().'.'.self::$imageExtension; // 23234627384.png
        self::$directory = 'sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;
    }

    public static function newSubCategory($request)
    {
        self::$SubCategory = new SubCategory();
        self::$SubCategory->category_id       = $request->category_id;
        self::$SubCategory->name              = $request->name;
        self::$SubCategory->description       = $request->description;
        self::$SubCategory->image             = self::getImageUrl($request);
        self::$SubCategory->save();
    }
    public static function updateSubCategory($request , $id)
    {
        self::$SubCategory = SubCategory::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$SubCategory->image))
            {
                unlink(self::$SubCategory->image);
            }
            self::$imageURL = self::getImageUrl($request);
        }
        else
        {
            self::$imageURL = self::$SubCategory->image;
        }
        self::$SubCategory->category_id       = $request->category_id;
        self::$SubCategory->name              = $request->name;
        self::$SubCategory->description       = $request->description;
        self::$SubCategory->image             = self::getImageUrl($request);
        self::$SubCategory->save();
    }
    public static function deleteSubCategory($id)
    {
        self::$SubCategory = SubCategory::find($id);
        if(file_exists(self::$SubCategory->image))
        {
            unlink(self::$SubCategory->image);
        }
        self::$SubCategory->delete();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

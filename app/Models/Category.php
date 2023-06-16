<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\name;

class Category extends Model
{
    use HasFactory;

    private static $category, $image,$imageExtension, $imageURL, $imageName, $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension(); //png
        self::$imageName = time().'.'.self::$imageExtension; // 23234627384.png
        self::$directory = 'category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;
    }

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name              = $request->name;
        self::$category->description       = $request->description;
        self::$category->image             = self::getImageUrl($request);
        self::$category->save();
    }
    public static function updateCategory($request , $id)
    {
        self::$category = Category::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageURL = self::getImageUrl($request);
        }
        else
        {
            self::$imageURL = self::$category->image;
        }
        self::$category->name              = $request->name;
        self::$category->description       = $request->description;
        self::$category->image             = self::$imageURL;
        self::$category->save();
    }
    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if(file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}

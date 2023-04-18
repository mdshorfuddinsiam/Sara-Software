<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static $data = [];
    protected static $category = [];

    public static function addNewCategory($request){
    	// dd($request->all());
    	self::$data = $request->all();
    	// dd(self::$data);
    	self::$data['category_slug'] = strtolower(str_replace(' ', '-', $request->category_name));
    	Category::create(self::$data);
    }

    public static function updateCategory($request, $category){
    	// dd($request->all());
    	self::$category = $category;
    	self::$data = $request->all();
    	// dd(self::$data);
    	self::$data['category_slug'] = strtolower(str_replace(' ', '-', $request->category_name));
    	self::$category->update(self::$data);
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id','id');
    }

}

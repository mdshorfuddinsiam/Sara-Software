<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
	public function index(){
		$categories = Category::orderBy('category_name')->get();
		$products = Product::latest()->limit(6)->get();
		$featureProducts = Product::Where('featured', '1')->latest()->limit(6)->get();
		$hotDeals = Product::Where('hot_deals', '1')->latest()->limit(6)->get();
		$specialDeals = Product::Where('special_deals', '1')->latest()->limit(6)->get();
		return view('index', compact('categories', 'products', 'featureProducts', 'hotDeals', 'specialDeals'));
	}

}

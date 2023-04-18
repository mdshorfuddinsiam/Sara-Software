<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Multiimg;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'qty' => 'required',
            'size' => 'required',
            'color' => 'required',
            'selling_price' => 'required',
            'short_descp' => 'required',
            'long_descp' => 'required',
            'thambnail' => 'required',
            'multi_img' => 'required',
        ]);

        $data = [];
        $data = $request->except('multi_img');
        $data['slug'] = strtolower(str_replace(' ', '-', $request->name));

        if($request->file('thambnail')){
            $imageFile = $request->file('thambnail');
            $imageName = 'thambnail-'.uniqid().rand(9999, 100000).'.'.$imageFile->getClientOriginalExtension();
            $directory = 'upload/product/thambnail-images/';
            Image::make($imageFile)->resize(917, 1000)->save($directory.$imageName);
            $data['thambnail'] = $directory.$imageName;
        }

        $product = Product::create($data);
        // dd($product);

        if($request->hasFile('multi_img')){
            $imageFiles = $request->file('multi_img');
            foreach ($imageFiles as $image) {
                $imageName = 'multi_img-'.uniqid().rand(9999, 100000).'.'.$image->getClientOriginalExtension();
                $directory = 'upload/product/multi-images/';
                Image::make($image)->resize(917, 1000)->save($directory.$imageName);
                $path = $directory.$imageName;
                Multiimg::create([
                    'product_id' => $product->id,
                    'multi_img' => $path,
                ]);
            }
        }

        $notification = array(
            'message' => 'Product created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('category_name', 'asc')->get();
        $multiImages = Multiimg::where('product_id', $product->id)->get();
        return view('backend.product.edit', compact('product','categories', 'multiImages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'qty' => 'required',
            'size' => 'required',
            'color' => 'required',
            'selling_price' => 'required',
            'short_descp' => 'required',
            'long_descp' => 'required',
        ]);

        $data = [];
        $data = $request->all();
        $data['slug'] = strtolower(str_replace(' ', '-', $request->name));
        if(!$request->hot_deals){
            $data['hot_deals'] = '0';
        }
        if(!$request->featured){
            $data['featured'] = '0';
        }
        if(!$request->special_offer){
            $data['special_offer'] = '0';
        }
        if(!$request->special_deals){
            $data['special_deals'] = '0';
        }

        $product->update($data);

        $notification = array(
            'message' => 'Product updated without image successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function multiimgUpdate(Request $request){
        // dd($request->all());

        if($request->hasFile('multi_img')){
            $imageFiles = $request->file('multi_img');
            foreach ($imageFiles as $id => $image) {
                $oldImg = Multiimg::where('id', $id)->first();
                // dd($oldImg);
                if(file_exists($oldImg->multi_img)){
                    unlink($oldImg->multi_img);
                }
                $imageName = 'multi_img-'.uniqid().rand(9999, 100000).'.'.$image->getClientOriginalExtension();
                $directory = 'upload/product/multi-images/';
                Image::make($image)->resize(917, 1000)->save($directory.$imageName);
                $path = $directory.$imageName;
                $oldImg->update(['multi_img' => $path]);
            }
            $notification = array(
                'message' => 'Product multi-image updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    public function multiimgDelete(Multiimg $multiimg){
        if(file_exists($multiimg->multi_img)){
            unlink($multiimg->multi_img);
        }
        $multiimg->delete();
        $notification = array(
            'message' => 'Product multi-image deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function thambnailUpdate(Request $request, Product $product){
        if($request->file('thambnail')){
            if(file_exists($product->thambnail)){
                unlink($product->thambnail);
            }
            $imageFile = $request->file('thambnail');
            $imageName = 'thambnail-'.uniqid().rand(9999, 100000).'.'.$imageFile->getClientOriginalExtension();
            $directory = 'upload/product/thambnail-images/';
            Image::make($imageFile)->resize(917, 1000)->save($directory.$imageName);
            $path = $directory.$imageName;
        }
        $product->update(['thambnail' => $path]);
        $notification = array(
            'message' => 'Product thambnail update successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function delete(Product $product){
        if(file_exists($product->thambnail)){
            unlink($product->thambnail);
        }
        $product->delete();
        $multiImages = Multiimg::where('product_id', $product->id)->get();
        foreach ($multiImages as $image) {
            if(file_exists($product->thambnail)){
                unlink($product->thambnail);
            }
            $image->delete();
        }
        $notification = array(
            'message' => 'Product deleted with image successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // Product Details
    public function productDetails(Product $product){
        return view('frontend.product.product-details', compact('product'));
    }

    // Product Details
    public function categoryWiseProduct(Category $category){
        $catWiseProducts = Product::where('category_id', $category->id)->latest()->get(); 
        return view('frontend.product.categorywise-product', compact('catWiseProducts'));
    }


}

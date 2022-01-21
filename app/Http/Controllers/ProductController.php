<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function __construct() {
        $this->middleware('Auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.createProduct')->with([
            'categories' => Category::with("children")->where("cat_parent",0)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'name' =>'required|min:3',
            'description' =>'required|min:5',
            'image' =>'required|image|mimes:png,jpg,jpg|max:2048',
            'price' =>'required|numeric',
            'cat_name' =>'required|numeric',
            'remise' =>'numeric',
            'recommanded' =>'numeric',
            'quantity' =>'required|numeric',
        ]); 
         //add data
        if($request->has('image')){
            $file      = $request->image;
            $imageName = 'images/products/'.time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/products'), $imageName);
            $name = $request->name;

            Product::create([
                'name' => $name,
                'slug' => Str::slug('name'),
                'description' => $request->description,
                'price' => $request->price,
                'cat_name' => $request->cat_name,
                'remise' => $request->remise,
                'recommanded' => $request->recommanded,
                'quantity' => $request->quantity,
                'image' => $imageName
            ]);
            return redirect()->route('admin.products')->withMessage('The product has been created');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('admin.editProduct')->with([
            'product'    => $product,
            'categories' => Category::with("children")->where("cat_parent",0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validation
        $this->validate($request,[
            'name' =>'required|min:3',
            'description' =>'required|min:5',
            'image' =>'|image|mimes:png,jpg,jpg|max:2048',
            'price' =>'required|numeric',
            'cat_name' =>'required|numeric',
            'remise' =>'numeric',
            'recommanded' =>'numeric',
            'quantity' =>'required|numeric',
        ]); 
        //update data
        if($request->has('image')){
            $image_path = public_path('images/products'.$product->image);
            if(File::exists($image_path)){
                unlink($image_path);
            }  
            $file = $request->image;
            $imageName = 'images/products/'.time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }
            $name = $request->name;
            $product->update([
                'name' => $name,
                'slug' => Str::slug('name'),
                'description' => $request->description,
                'price' => $request->price,
                'cat_name' => $request->cat_name,
                'remise' => $request->remise,
                'recommanded' => $request->recommanded,
                'quantity' => $request->quantity,
                'image' => $product->image
            ]);
            return redirect()->route('admin.products')->withMessage('The product has been created');
          

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
            $image_path = public_path('images/products'.$product->image);
            if(File::exists($image_path)){
                unlink($image_path);
            }  
            $product->delete();
            return redirect()->route('admin.products')->withMessage('The product has been deleted');
    }
}

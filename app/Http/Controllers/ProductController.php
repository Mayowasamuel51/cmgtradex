<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::getAllProduct();
        // return $products;
        return view('backend.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::get();
        $category = Category::where('is_parent', 1)->get();
        // return $category;
        return view('backend.product.create')->with('categories', $category)->with('brands', $brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // return $request->all();
    //     $this->validate($request,[
    //         // 'title'=>'string|required',
    //         // 'summary'=>'string|required',
    //         // 'description'=>'string|nullable',
    //         // 'photo'=>'string|required',
    //         // 'size'=>'nullable',
    //         // 'stock'=>"required|numeric",
    //         // 'cat_id'=>'required|exists:categories,id',
    //         // 'brand_id'=>'nullable|exists:brands,id',
    //         // 'child_cat_id'=>'nullable|exists:categories,id',
    //         // 'is_featured'=>'sometimes|in:1',
    //         // 'status'=>'required|in:active,inactive',
    //         // 'condition'=>'required|in:default,new,hot',
    //         // 'price'=>'required|numeric',
    //         // 'discount'=>'nullable|numeric'
    //     ]);
    //     $image = array();
    //     if($file = $request->file('photo')){
    //         foreach($file as $file){
    //             $image_name = md5(rand(1000,10000));
    //             $ext = strtolower($file->getClientOriginalExtension());
    //             $image_full_name = $image_name.'.'.$ext;
    //             $uploade_path = 'uploads/images/';
    //             $image_url = $uploade_path.$image_full_name;
    //             $file->move($uploade_path,$image_full_name);
    //             $image[] = $image_url;
    //         }
    //         Image::insert([
    //             'image' => implode('|', $image),
    //             'producd' => $request->producd,
    //         ]);
    //         // return redirect('/image.index'));       
    //     }

    //     $data=$request->all();
    //     $slug=Str::slug($request->title);
    //     $count=Product::where('slug',$slug)->count();
    //     if($count>0){
    //         $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
    //     }
    //     $data['slug']=$slug;
    //     $data['is_featured']=$request->input('is_featured',0);
    //     $size=$request->input('size');
    //     if($size){
    //         $data['size']=implode(',',$size);
    //     }
    //     else{
    //         $data['size']='';
    //     }
    //     // return $size;
    //     // return $data;
    //     $status=Product::create($data);
    //     if($status){
    //         request()->session()->flash('success','Product Successfully added');
    //     }
    //     else{
    //         request()->session()->flash('error','Please try again!!');
    //     }
    //     return redirect()->route('product.index');

    // }

    public function store(Request $request)
    {
        // Validate request
        $this->validate($request, [
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048', // Validate multiple images
            'size' => 'nullable',
            'stock' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric'
        ]);

        // this is the production side backend not this 

        
        $image_one = $request->photo;


        if($image_one) {
            $manager = new ImageManager(new Driver());
            $image_one_name = hexdec(uniqid()) . '.' . strtolower($image_one->getClientOriginalExtension());
            $image = $manager->read($image_one);
            // $image->resize(150, 150);
            // $image->
            $final_image = 'uploads/images/'.$image_one_name;
            $image->save($final_image);
            $photoSave1 = $final_image;
            $rro = 1;
        }
        // $staff->image = $photoSave1;
        // Prepare data for the product
        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Product::where('slug', $slug)->count();

        if ($count > 0) {
            $slug .= '-' . date('ymdis') . '-' . rand(0, 999);
        }

        $data['slug'] = $slug;
        $data['is_featured'] = $request->input('is_featured', 0);
        $data['size'] = $request->input('size') ? implode(',', $request->input('size')) : '';



        $data['photo'] = $photoSave1; // Storing images in 'photo' column
        // Save product
        $status = Product::create($data);

        if ($status) {
            $request->session()->flash('success', 'Product Successfully added');
        } else {
            $request->session()->flash('error', 'Please try again!!');
        }

        return redirect()->route('product.index');
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
    public function edit($id)
    {
        $brand = Brand::get();
        $product = Product::findOrFail($id);
        $category = Category::where('is_parent', 1)->get();
        $items = Product::where('id', $id)->get();
        // return $items;
        return view('backend.product.edit')->with('product', $product)
            ->with('brands', $brand)
            ->with('categories', $category)->with('items', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'string|required',
            'size' => 'nullable',
            'stock' => "required|numeric",
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric'
        ]);

        $data = $request->all();
        $data['is_featured'] = $request->input('is_featured', 0);
        $size = $request->input('size');
        if ($size) {
            $data['size'] = implode(',', $size);
        } else {
            $data['size'] = '';
        }
        // return $data;
        $status = $product->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Product Successfully updated');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();

        if ($status) {
            request()->session()->flash('success', 'Product successfully deleted');
        } else {
            request()->session()->flash('error', 'Error while deleting product');
        }
        return redirect()->route('product.index');
    }
}

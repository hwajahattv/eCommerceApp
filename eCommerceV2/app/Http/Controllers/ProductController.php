<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Image;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addproduct(){
        $category_lists=Category::all('id','name','parent_id');
        return view ('admin.products.addproduct',['category_data'=>$category_lists]);
    }
    public function storeproduct (Request $request){
        $data = $request->all();
    
        //model call
    
        $pro= new Product;
    
        $pro->title = $data["productTitle"];
        $pro->product_slug = $data["productSlug"];
        $pro->description = $data["productDescription"];
        $pro->SKU = $data["productSKU"];
        $pro->price = $data["productPrice"];
        $pro->size = $data["productSize"];
        $pro->stock = $data["productStock"];
        $pro->enabled = $data["enabled"];
        $pro->category_id = $data["sel_category"];
       
        //image validation
    
        if($request->hasfile('productImageName')){
           $img_tmp = $request->file('productImageName');
    
           $extension = $img_tmp->getClientOriginalExtension();
    
           $filename = uniqid().'.'.$extension;
    
           $img_path = 'uploads/product/'.$filename;
    
           Image::make($img_tmp)->resize(400,400)->save($img_path);
           $pro->product_image = $filename;
        }
    
        $pro->save();
        return redirect()->back();
    
       }
       public function showCategoryList(){
        $category_lists=Category::all('id','name','parent_id');
        return view ('admin.products.showcat',['category_data'=>$category_lists]);
       }
       
       public function displayProductsFromCategory(Request $request){
        $data = $request->all();
        $category_lists=Category::all('id','name','parent_id');
        $alldata = Product::with('Category')->where(['category_id'=>$data['sel_category']])->get();
      // dd($alldata);
  
        return view ('admin.products.showProductsFromCategory', ['pro_list'=>$alldata, 'category_data'=>$category_lists]);
       }

}

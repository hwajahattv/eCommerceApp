<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_lists=Category::all('id','name','parent_id');
        return view ('admin.category.add',['category_data'=>$category_lists])->with(['success'=>""]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $categories = Category::all();
    //     return view('admin.category.add')->with(compact(['categories']));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
        //model call
    
        $cat = new Category;
    
        $cat->name = $data["categoryName"];
        $cat->description = $data["categoryDescription"];
        $cat->parent_id = $data["parentCategory"];
        //image validation
    
        if($request->hasfile('categoryThumbnail')){
            $img_tmp = $request->file('categoryThumbnail');
    
            $extension = $img_tmp->getClientOriginalExtension();
    
            $filename = uniqid().'.'.$extension;
    
            $img_path = 'uploads/category/'.$filename;
    
            Image::make($img_tmp)->resize(400,400)->save($img_path);
            $cat->image = $filename;
        }
    
        $cat->save();
        return redirect()->back()->with(['success' => 'Category added successfully.']);
        
    
        // if ($category->save() ) {
        //     return redirect()->route('categories.index')->with(['success' => 'Category added successfully.']);
        // }

        // return redirect()->back()->with(['fail' => 'Unable to add category.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategory(){

        $data_send = Category::all();
  
        return view ('admin.category.show', ['alldata'=>$data_send]);
       }


       public function editcategory($id_receive){
        $alldata = Category::where(['id'=>$id_receive])->first();
        $category_lists=Category::all('id','name','parent_id');
         // dd($alldata);
        return view ('admin.category.edit',['data_send'=>$alldata,'listForParent'=>$category_lists]);
     }

     public function posteditcategory(Request $request, $id_received){
        $data = $request->all();
    
        //model call
    
        $cat = new Category;
    
        $cat->name = $data["categoryName"];
        $cat->description = $data["categoryDescription"];
        $cat->parent_it = $data["parentCategory"];
    
        //image validation
    
        if($request->hasfile('image')){
           $img_tmp = $request->file('image');
    
           $extension = $img_tmp->getClientOriginalExtension();
    
           $filename = uniqid().'.'.$extension;
    
           $img_path = 'uploads/category/'.$filename;
    
           Image::make($img_tmp)->resize(400,400)->save($img_path);
           $cat->image = $filename;
        }
        else
        {
           $filename=$data['current_image'];
        }
        Category::where(['id'=>$id_received])->update(['name'=>$data['categoryName'],'parent_id'=>$data['parentCategory'],'description'=>$data['categoryDescription'],'image'=>$filename]);
        return redirect('/showCategory');
       }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(CreateCategory $request, Category $category)
    // {
    //     $category->name = $request->name;
    //     $category->parent_id = $request->parent_category ? $request->parent_category : 0;

    //     if ($category->save() ) {
    //         return redirect()->route('categories.index')->with(['success' => 'Category successfully updated.']);
    //     }

    //     return redirect()->back()->with(['fail' => 'Unable to update category.']);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletecategory($id){

        $alldata = Category::all();
        
        Category::where(['id'=>$id])->delete();
        return redirect()->back()->with(['success' => 'Category successfully deleted.']);;
       }
    
}
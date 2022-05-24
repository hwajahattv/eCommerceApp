@extends('admin.master.parent')

@section('content1')
 <div class="container">
     <h1 class="text-center display-5">Add New Product</h1>
     <!-- @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif -->
     <form method="post" action="{{ url('/storeproduct') }} " enctype="multipart/form-data"> 
         @csrf
         <x-Input type="text" name="productTitle" placeholder="Enter the product title:"/>
         <x-Input type="text" name="productSlug" placeholder="Enter the product slug:"/>
         <x-Input type="text" name="productSKU" placeholder="Enter the product SKU:"/>
         <x-Input type="number" name="productPrice" placeholder="Enter the product price:"/>
         <div class="form-group">
             <label for="">Product size:</label>
             <select name="productSize" id="enabled">
                 <option value="XS">XS</option>
                 <option value="S">S</option>
                 <option value="M">M</option>
                 <option value="L">L</option>
                 <option value="XL">XL</option>
                </select>
            </div>
        <x-Input type="text" name="productDescription" placeholder="Enter the product details:"/>
        <x-Input type="number" name="productStock" placeholder="Enter the product stock:"/>
        <label>Upload product image:</label>
        <input type="file" name="productImageName" />
        <div class="form-group">
            <label for="">Product status enabled/disabled:</label>
            <select name="enabled" id="enabled">
                <option selected value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
         </div>
      
         <div class="form-group">
            <label for="">Select Category:</label>
            <select name="sel_category">
                @foreach ( $category_data as $catdata)
                    @if($catdata->parent_id!=1)
                        @foreach($category_data as $parentCategory)
                            @if($parentCategory->id==$catdata->parent_id)
                                <option value="{{$catdata->id}}">{{$catdata->name}} ({{$parentCategory->name}})</option>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </select>
         </div>

         <div class="form-group">
            <input type="submit" class="btn btn-primary"  value="Save" />
         </div>
     </form>
 </div>
@endsection
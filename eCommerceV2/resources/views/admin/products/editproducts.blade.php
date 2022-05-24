@extends('admin.master.parent')

@section('content')
 <div class="container">
     <h1 class="text-center display-5">Edit Product</h1>
     <!-- @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif -->
     <form method="post" action="{{ url('/posteditpro'.$data_send->id) }} " enctype="multipart/form-data"> 
         @csrf
         <div class="form-group">
             <label>Product Title:</label>
             <input type="text" name="pname" class="form-control" value="{{$data_send->title}}">
         </div>

         <div class="form-group">
             <label>Product Slug:</label>
             <input type="text" name="pslug" class="form-control" value="{{$data_send->product_slug}}">
         </div>
         <div class="form-group">
             <label>Product Description:</label>
             <input type="textarea" name="pdescription" class="form-control" value="{{$data_send->description}}">
         </div>
         <div class="form-group">
             <label>Product Price:</label>
             <input type="textarea" name="pprice" class="form-control" value="{{$data_send->price}}">
         </div>
         <div class="form-group">
            <label for="">Product status enabled/disabled:</label>
            <select name="enabled" id="enabled" value="{{$data_send->enabled}}">
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
         </div>
         <div class="form-group">
             <label>Product Stock:</label>
             <input type="number" name="pstock" class="form-control" value="{{$data_send->stock}}">
         </div>

         <div class="form-group">
             <label>Category Tumbnail:</label>
             
             <input type="file" name="pimage" class="form-control">
             <input type="hidden" name="current_image" value="{{$data_send->product_image}}">
             @if (!empty ($data_send->product_image))
             <img style="width:110px; height:110px;" src="{{ asset('/uploads/Products/'.$data_send->product_image) }}" />
   
             @endif
         </div>

         <div class="form-group">
            <label for="">Select Category:</label>
            <select name="sel_category">
            <option selected>SELECT CAT</option>
                @foreach ( $category_data as $catdata)
                @if ($data_send->Category->id==$catdata->id)
                <option value="{{$catdata->id}}" selected>{{$catdata->name}}</option>
                @else
                <option value="{{$catdata->id}}">{{$catdata->name}}</option>
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
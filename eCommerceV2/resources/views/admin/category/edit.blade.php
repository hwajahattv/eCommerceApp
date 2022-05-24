@extends('admin.master.parent')

@section('content1')
<div class="container bg-warning">
<h1 class="text-center display-3">Edit the category "{{$data_send->name}}"</h1>
<form method="post" action="{{ url('/posteditcategory/'.$data_send->id) }} " enctype="multipart/form-data"> 
         @csrf
         <div class="form-group">
             <label>Category Name:</label>
             <input type="text" name="categoryName" class="form-control" value="{{$data_send->name}}">
         </div>

         <div class="form-group">
             <label>Category Description:</label>
             <input type="text" name="categoryDescription" class="form-control" value="{{$data_send->description}}">
         </div>

         <div class="form-group">
             <label>Category Tumbnail:</label>
             
             <input type="file" name="categoryThumbnail" class="form-control">
             <input type="hidden" name="current_image" value="{{$data_send->image}}">
             @if (!empty ($data_send->image))
             <img style="width:110px; height:110px;" src="{{ asset('/uploads/category/'.$data_send->image) }}" />
   
             @endif
         </div>
         <label for="exampleFormControlSelect1">Select parent category</label>
    <select class="form-control col-md-2" id="selectParentCategory" name="parentCategory">
      <option default value="1">Parent</option>
      @foreach ( $listForParent as $selectParentCategory)
        @if($selectParentCategory->parent_id==1)
        @if($selectParentCategory->id==$data_send->parent_id)
                <option selected value="{{$selectParentCategory->id}}">{{$selectParentCategory->name}}</option>
                @else
                <option value="{{$selectParentCategory->id}}">{{$selectParentCategory->name}}</option>
                @endif
        @endif
      @endforeach
    </select>
         <div class="form-group">
            <input type="submit" class="btn btn-primary"  value="Save" />
         </div>
     </form>

</div>
@endsection
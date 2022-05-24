@extends('admin.master.parent')

@section('content1')
<div class="container">
      <h1 class="text-center display-3">Select the Category</h1>
      <form method="post" action="{{ url('/displayProductsFromCategory') }} " enctype="multipart/form-data"> 
         @csrf
         
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
            <input type="submit" class="btn btn-primary"  value="Show Products" />
         </div>
     </form>

@endsection
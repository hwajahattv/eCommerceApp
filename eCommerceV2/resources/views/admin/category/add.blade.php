@extends('admin.master.parent')

@section('content1')
<div class="container bg-warning">
<h1 class="text-center display-3">Add new category</h1>
@if(session()->has('$success'))
<div class="jumbotron">{{$success}}</div>
@endif

<form action="{{url('/')}}/addCategory" method="post">
    @csrf
    <x-Input type="text" name="categoryName" placeholder="Enter the category name"/>
    <x-Input type="text" name="categoryDescription" placeholder="Give details about category"/>
    <x-Input type="file" name="categoryThumbnail" placeholder="Upload the thumbnail image"/>
    <div class="form-group col-md-6">
    <div class="row">
   <label for="exampleFormControlSelect1">Select parent category</label>
    <select class="form-control col-md-2" id="selectParentCategory" name="parentCategory">
      <option default selected value="1">Parent</option>
      @foreach ( $category_data as $catdata)
            @if($catdata->parent_id==1)
                <option value="{{$catdata->id}}">{{$catdata->name}}</option>
                @endif
      @endforeach
    </select>
    </div>
      <input type="submit" class="btn btn-success"/>  
    </div>
 
  <!-- <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div> -->

</form>
</div>
@endsection
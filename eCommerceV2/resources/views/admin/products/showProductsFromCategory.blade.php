@extends('admin.master.parent')

@section('content1')
<div class="container">
      <h1 class="text-center display-3">List of All Products from Category</h1>
      <table class="table table-bordered">
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Price</th>
              <th>Stock</th>
              <th>SKU</th>
              <th>Description</th>
              <th>Category Name</th>
              <th>Thumbnail</th>
              <th colspan="2">Actions</th>
          </tr>

          @foreach ($pro_list as $abc)
          <tr>
              <td>{{ $abc->id }}</td>
              <td>{{ $abc->title}}</td>
              <td>{{ $abc->product_slug }}</td>
              <td>{{ $abc->price }}</td>
              <td>{{ $abc->stock }}</td>
              <td>{{ $abc->SKU }}</td>
              <td>{{ $abc->description }}</td>
              <td>{{ $abc->Category->name }} 
              @foreach($category_data as $parentCategory)
                            @if($parentCategory->id==$abc->Category->parent_id)
                                ({{$parentCategory->name}})
                            @endif
                        @endforeach
              </td>
              <td><img style="width:110px; height:110px;" src="{{ asset('/uploads/Products/'.$abc->product_image) }}" /></td>
              <td><a href="{{ url('/geteditpro/'.$abc->id) }}" class="btn btn-outline-info">Edit</a></td>
              <td><a href="{{ url('/deleteproduct/'.$abc->id) }}" class="btn btn-outline-danger">Delete</a></td>              
          </tr>              
          @endforeach
</table>

@endsection
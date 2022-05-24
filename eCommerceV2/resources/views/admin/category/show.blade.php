@extends('admin.master.parent')

@section('content1')
<div class="container">
      <h1 class="text-center display-3">List of All Categories</h1>
      <table class="table table-bordered">
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Parent Category</th>
              <th>Thumbnail</th>
              <th colspan="2">Actions</th>
          </tr>

          @foreach ($alldata as $abc)
          <tr>
              <td>{{ $abc->id }}</td>
              <td>{{ $abc->name }}</td>
              <td>{{ $abc->description }}</td>
              <!-- <td>{{ $abc->parent_id }}</td> -->
              @foreach($alldata as $category)
              @if($abc->parent_id==1)
              <td>
                Parent Category
              </td>
              @break
                @elseif($category->id==$abc->parent_id)
                <td>
                    {{ $category->name }}
                    @break
                    @endif
                  </td>
              @endforeach

              <td><img alt="No image added." style="width:110px; height:110px;" src="{{ asset('/uploads/category/'.$abc->image) }}" /></td>
              <td><a href="{{ url('/editcategory/'.$abc->id) }}" class="btn btn-outline-info">Edit</a></td>
              <td><a href="{{ url('/deletecategory/'.$abc->id) }}" class="btn btn-outline-danger">Delete</a></td>              
          </tr>              
          @endforeach
</table>

@endsection
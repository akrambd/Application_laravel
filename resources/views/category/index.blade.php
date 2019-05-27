@extends('navbar')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <h3>Add new Category</h3>
                <form method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Save Category</button>
                    </div>
                </form>

            </div>


            <div class="col-sm-6">

                <h2>List of Categories</h2>

                <table class="table table-bordered">
                    <thead class="badge-primary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                        <th>Post</th>
                    </tr>
                    </thead>

                    @foreach($categories as $category)
                        <tbody>
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td><a class="btn btn-sm btn-outline-primary" href="{{route('category.edit',$category->id)}}">Edit</a>
                                <form method="post" class="d-inline" action="{{route('category.destroy',$category->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-outline-danger" name="submit" value="Delete" >
                                </form>
                            </td>
                            <td><a href="{{route('postview',$category->id)}}">view</a></td>

                        </tr>

                        </tbody>

                    @endforeach
                </table>

            </div>

        </div>
    </div>








@endsection



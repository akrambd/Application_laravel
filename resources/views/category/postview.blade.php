

@extends('navbar')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-sm-4">


            <h3>Add new Post</h3>

                <form method="post" action="{{route('postadd',$category->id)}}">

            @csrf
                <div class="form-group">
                    <label for="">Post title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <input type="hidden" name="category_id" class="form-control" value="{{$category->id}}">
                </div>

                <div class="form-group">
                    <label for="">Post Content</label>
                    <textarea type="text" rows="5" name="content" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-lg">Save Category</button>
                </div>
            </form>

            </div>


            <div class="col-sm-8">

                <h2>Posts Under Categories</h2>

                <h3>Category Name:{{$category->name}}</h3>

                <table class="table table-bordered">
                    <thead class="badge-primary">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    @foreach($post as $posts)
                        <tbody>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$posts->title}}</td>
                            <td>{{$posts->content}}</td>
                            <td><a class="btn btn-sm btn-outline-primary" href="{{route('postedit',$posts->id)}}">Edit</a>
                                <form method="post" class="d-inline" action="{{route('postdelete',$posts->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-outline-danger" name="submit" value="Delete" >
                                </form>
                            </td>

                        </tr>

                        </tbody>

                    @endforeach
                </table>

            </div>

        </div>
    </div>
@endsection
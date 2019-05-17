
@extends('navbar')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <h3>Add New Post Under Category</h3>
                <form method="post" action="{{route('post.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select One --</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Post Content</label>
                        <textarea type="text" rows="5" name="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Save Post</button>
                    </div>
                </form>

            </div>

            <div class="col-sm-6">

                <h2>List of Posts</h2>

                <table class="table table-bordered">
                    <thead class="badge-primary">
                    <tr>
                        <th>ID</th>
                        <th>title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    @foreach($posts as $post)
                        <tbody>
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->content}}</td>
                                <td><a class="btn btn-sm btn-outline-primary" href="{{route('post.edit',$post->id)}}">edit</a>
                                    <form method="post" class="d-inline" action="{{route('post.destroy',$post->id)}}">
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




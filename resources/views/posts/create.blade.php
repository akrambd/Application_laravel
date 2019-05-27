
@extends('navbar')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-lg-3">

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
                    </div>lated

                    <div class="form-group">
                        <label for="">Post Content</label>
                        <textarea type="text" rows="5" name="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Save Post</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
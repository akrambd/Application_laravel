@extends('navbar')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-lg-3">

                <form method="post" id="clearThisForm" action="{{route('postupdate',$post->id)}}">

                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Post title</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}" id="myInput">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="category_id" class="form-control" value="{{$post->category->id}}">
                    </div>

                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" class="form-control" value="{{$post->category->name}}" disabled >
                    </div>

                    <div class="form-group">
                        <label for="">Post Content</label>
                        <textarea type="text" rows="5" name="content" class="form-control">{{$post->content}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Update Post</button>
                    </div>
                    <div class="form-group">
                        <input type="reset" class="btn btn-info btn-lg" value="Clear">
                    </div>
                </form>


                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-lg" onclick="document.getElementById('clearThisForm').reset()">Clear</button>
                </div>


                {{--<form method="post" action="{{route('category.destroy',$category->id)}}">--}}

                    {{--@csrf--}}
                    {{--@method('DELETE')--}}
                    {{--<input type="submit" name="submit" value="Delete" >--}}

                {{--</form>--}}

            </div>
        </div>
    </div>
@endsection
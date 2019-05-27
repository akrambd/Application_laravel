@extends('navbar')

@section('content')



    <div class="container">
        <div class="row">
            {{--<div class="col-sm-6">--}}

                {{--<h3>Add new Category</h3>--}}
                {{--<form method="post" action="{{route('category.store')}}">--}}
                    {{--@csrf--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="">Category Name</label>--}}
                        {{--<input type="text" name="name" class="form-control">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<button type="submit" class="btn btn-outline-primary btn-lg">Save Category</button>--}}
                    {{--</div>--}}
                {{--</form>--}}

            {{--</div>--}}


            <div class="col-sm-6">

                <h2>List of Categories</h2>

                <table class="table table-bordered">
                    <thead class="badge-primary">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                    </tr>
                    </thead>

                    @foreach($posts as $post)
                        <tbody>
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>

                        </tr>

                        </tbody>

                    @endforeach
                </table>

            </div>

        </div>
    </div>








@endsection
@extends('navbar')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-lg-3">

                <form method="post" action="{{route('category.update',$category->id)}}">

                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}" id="myInput">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Update Category</button>
                    </div>
                </form>


                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-lg" onclick="document.getElementById('myInput').value = ''">Clear</button>
                </div>


                <form method="post" action="{{route('category.destroy',$category->id)}}">

                    @csrf
                    @method('DELETE')
                    <input type="submit" name="submit" value="Delete" >

                </form>

            </div>
        </div>
    </div>
@endsection
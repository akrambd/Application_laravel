@extends('navbar')



@section('content')


{{--<form method="post" action="{{route('student.store')}}" enctype="multipart/form-data">--}}

    {{--@csrf--}}

    {{--<input type="text" name="name" placeholder="Name here">--}}

    {{--<input type="text" name="department" placeholder="Department here">--}}

    {{--<input type="text" name="shift" placeholder="Shift here">--}}


    {{--<input type="submit" value="Add">--}}


{{--</form>--}}

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-lg-3">


            <div align="right">

                <a href="{{route('student.index')}}" class="btn btn-outline-info">Back</a>
            </div>

            <form method="post" enctype="multipart/form-data" action="{{route('student.store')}}">

                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Your Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}"  placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="">Department</label>
                    <input type="text" class="form-control"  name="department" value="{{old('department')}}" placeholder="Your department">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Browse your photo </label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check_box">
                    <label class="form-check-label" for="exampleCheck1">Do you agree?</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<div class="container"></div>

@endsection
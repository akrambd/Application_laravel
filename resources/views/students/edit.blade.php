@extends('navbar')




@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-lg-3">

                    <form method="post" enctype="multipart/form-data" action="{{route('student.update',$student->id)}}">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Name</label>
                            <input type="text" class="form-control" name="name" value="{{$student->name}}"  placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{$student->email}}" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="">Department</label>
                            <input type="text" class="form-control"  name="department" value="{{$student->department}}" placeholder="Your department">
                        </div>
                        {{--<div class="form-group form-check">--}}
                            {{--<input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                            {{--<label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Browse your photo </label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{asset('images/students/'.$student->image)}}" style="width:100px; height:100px;" class="rounded mx-auto d-block" alt="...">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    {{--<form method="post" action="{{route('student.destroy',$student->id)}}">--}}
                        {{--@csrf--}}
                        {{--@method('DELETE')--}}
                        {{--<button type="submit" class="btn btn-primary">delete</button>--}}
                    {{--</form>--}}

                </div>
            </div>
        </div>




@endsection
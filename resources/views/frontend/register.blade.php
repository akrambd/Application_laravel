@extends('navbar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="well">
                    <h3 class="text-center mt-2">User Registration Form</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-{{session('type')}}">
                            {{session('message')}}
                        </div>
                    @endif


                    <form method="post" action="{{route('register')}}">

                            @csrf

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control"  name="first_name"  placeholder="Enter first name" value="{{old('first_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control"  name="last_name"  placeholder="Enter last name" value="{{old('last_name')}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" value="{{old('mobile_number')}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password again">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registration</button>
                        </form>
                </div>
            </div>
        </div>
    </div>



@endsection
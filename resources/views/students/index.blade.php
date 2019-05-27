@extends('navbar')



@section('content')





        <div class="row">
            <div class="col-lg-12">

                <h3 class="text-center mt-auto">List of Students</h3>

                <div align="right">
                    {{$students->links()}}
                    <a href="{{route('student.create')}}" class="btn btn-outline-success">Add</a>
                </div>

                    <table class="table table-bordered">
                        <thead class="badge-primary">
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        @foreach($students as $key=>$student)
                        <tbody>
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td><img src="{{asset('images/students/'.$student->image)}}" style="width:100px; height:100px;" class="rounded mx-auto d-block" alt="..."></td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->department}}</td>
                            <td><a class="btn btn-sm btn-outline-primary" href="{{route('student.edit',$student->id)}}">Edit</a>
                                <form method="post" class="d-inline" action="{{route('student.destroy',$student->id)}}">
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


    <div align="right">{{$students->links()}}</div>



@endsection
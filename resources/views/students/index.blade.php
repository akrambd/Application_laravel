<h1><a href="{{route('student.create')}}">Add New Students</a></h1>

@foreach($students as $student)


    <h3><li><a href="{{route('student.show', $student->id)}}">{{$student->name}}</a></li></h3>

@endforeach

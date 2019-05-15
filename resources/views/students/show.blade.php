<h3><a href="{{route('student.index')}}">Home</a></h3>

<h1><a href="{{route('student.edit', $student->id)}}">

    {{$student->name}}

    </a>
</h1>

<form method="post" action="{{route('student.destroy',$student->id)}}">

    @csrf
    @method('DELETE')

    <input type="submit" value="Delete">


</form>
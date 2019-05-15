<form method="post" action="{{route('student.update',$student->id)}}">

    @csrf
    @method('PATCH')

    <input type="text" name="name" value="{{$student->name}}">

    <input type="text" name="department" value="{{$student->department}}">

    <input type="text" name="shift" value="{{$student->shift}}">


    <input type="submit" name="submit" value="Add">


</form>


<form method="post" action="{{route('student.destroy',$student->id)}}">

    @csrf
    @method('DELETE')

    <input type="submit" value="Delete">


</form>
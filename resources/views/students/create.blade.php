<form method="post" action="{{route('student.store')}}">

    @csrf

    <input type="text" name="name" placeholder="Name here">

    <input type="text" name="department" placeholder="Department here">

    <input type="text" name="shift" placeholder="Shift here">


    <input type="submit" value="Add">


</form>
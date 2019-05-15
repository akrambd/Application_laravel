<form method="post" action="{{route('category.update',$category->id)}}">

    @csrf
    @method('PATCH')

    <input type="text" name="name" value="{{$category->name}}">

    {{--<input type="text" name="slug" placeholder="Enter slug here">--}}

    <input type="submit" name="submit" value="Update" >

</form>


<form method="post" action="{{route('category.update',$category->id)}}">

    @csrf
    @method('DELETE')

    <input type="submit" name="submit" value="Delete" >

</form>
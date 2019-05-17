<a href="{{route('category.index')}}">Home</a>

<h1>
    <a href="{{route('category.edit', $category->id)}}">
     {{$category->name}}
    </a>
</h1>

<form method="post" action="{{route('category.destroy',$category->id)}}">

    @csrf
    @method('DELETE')

    <input type="submit" name="submit" value="Delete" >

</form>
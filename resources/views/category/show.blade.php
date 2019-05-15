<a href="{{route('category.index')}}">Home</a>

<h1>
    <a href="{{route('category.edit', $category->id)}}">
     {{$category->name}}
    </a>
</h1>
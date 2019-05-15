
<h2><a href="{{route('category.create')}}">Add New</a></h2>

@foreach($categories as $category)

    <h3>

        <li>

            <a href="{{route('category.show',$category->id)}}">

                {{$category->name}}
            </a>

        </li>

    </h3>


@endforeach
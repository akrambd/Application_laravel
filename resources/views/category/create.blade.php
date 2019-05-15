




<form method="post" action="{{route('category.store')}}">

    @csrf

    <input type="text" name="name" placeholder="Enter name here">

    <input type="text" name="slug" placeholder="Enter slug here">

    <input type="submit" name="submit" value="Create" >
    
</form>



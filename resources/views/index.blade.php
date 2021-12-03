<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <title> TODO TODO TODO</title>
    <style>
body {

  background-color: rgb(147, 210, 229);
  min-height:5vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

h1 {
    color:rgb(42, 39, 75);
    text-align: center;
    text-decoration: overline;
    text-shadow: 2px 2px 5px rgb(219, 159, 159);
    display:grid;
}

button{
  background-color: rgb(240, 137, 137);
  border-radius: 25px;

}
#mar {
        background-color :yellow;
        color:black;
    }
input {
    padding: 15px;
    border-radius: 25px;
    box-shadow: 0px 0px 5px currentcolor;

}
li{
    display
}


</style>

</head>
<body>
    <div id="myDiv " class="">
    <h1><em>Tasks List</em></h1>
    <form action="/add" method="post">
      @csrf
      <input type="text" id="content" name="content" placeholder="enter what you have to do">
      <input type="submit"  value="submit" class="btn btn-dark">
    </form>
</div>

<div class="">
    <ul  id="taskList" clsdd="">
        @foreach ( $tasks as $task )
        <li id = "li_{{$task->id}}"> {{$task->content}}  {{$task->date}}
            <form action="/delete" method="post">
                @csrf
                <input type="text" value="{{$task->id}}" name ="id" style ="display: none;" >
                <button type=submit class="btn btn-danger" name="submit">x</button>

            </form>
            @if(!$task->completed)
           <a href ="{{route('tasks.completed', ['id'=>$task->id])}}" class="btn btn-xs btn-success">Mark As completed</a>
           @else
           <span class="text-success">completed!✔️✔️</span>
           @endif
        </li>
        @endforeach
    </ul>
        </div>
             </body>
</html>

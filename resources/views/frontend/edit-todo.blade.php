<!DOCTYPE html>
<html lang="en">

<?php
use Illuminate\Support\Facades\Session;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo | update todo list</title>

    <link href="{{ URL::to('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ URL::to('/') }}">
            <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" alt="mdb logo">
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ URL::to('/') }}">Home
                    </a>
                </li>


                <li class="nav-item active">
                    <a class="nav-link" href=""> <?php echo(Session::get('username')) ?>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ URL::to('/logout') }}">Đăng xuất
                    </a>
                </li>
            </ul>
            <!-- Links -->



            <form class="form-inline">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </div>
            </form>
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
        @foreach($editTodo as $key => $todo)
        <form action="{{ URL::to('/update-todo/'.$todo->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Tên task</label>
                <input type="text" class="form-control" value="{{ $todo->TaskName }}" placeholder="Nhập vào tên task" id="nameTask" name="nameTask">
            </div>
            <div class="form-group">
                <label for="sel1">Loại task</label>
                <select class="form-control" id="typeTodo" name="typeTodo">
                    @foreach($typeTodo as $key => $type_todo)
                    @if($type_todo->id == $todo->IdTypetodolist)
                    <option selected value="{{$type_todo->id}}">{{$type_todo->Name}}</option>
                    @else  
                    <option value="{{$type_todo->id}}">{{$type_todo->Name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="sel1">Loại task</label>
                <select class="form-control" id="status" name="status">
                    <option value="0" {{ $todo->Status == '0' ? 'selected' : ''}}>Đã hoàn thành</option>
                    <option value="1" {{ $todo->Status == '1' ? 'selected' : ''}}>Chưa hoàn thành</option>
                </select>
            </div>

            <div class="form-group">
                <a href="{{url()->previous()}}" class="btn btn-danger">Hủy</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>

        </form>
        @endforeach
    </div>

    <script>
    // Basic example
    $(document).ready(function() {
        $('#dtBasicExample').DataTable({
            "paging": false // false to disable pagination (or any other option)
        });
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
    <script type="text/javascript" src="{{ URL::to('frontend/js/main.css') }}">
    < script src = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity = "sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
    crossorigin = "anonymous" >
    </script>
</body>

</html>
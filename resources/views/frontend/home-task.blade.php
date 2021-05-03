<!DOCTYPE html>
<html lang="en">

<?php
use Illuminate\Support\Facades\Session;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | todo list</title>

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
        <!-- App title section -->

        <!-- View options section -->
        <div class="row m-1 p-3 px-5 justify-content-end">
            <div class="col-auto d-flex align-items-center">
                <a class="create-todo" href="{{ URL::to('/add-todo') }}">Thêm mới</a>
            </div>
            <div class="col-auto d-flex align-items-center">
                <label class="text-secondary my-2 pr-2 view-opt-label">Lọc</label>
                <select class="custom-select custom-select-sm btn my-2">
                    <option value="all" selected>Tất cả</option>
                    <option value="completed">Đã hoàn thành</option>
                    <option value="active">Chưa hoàn thành</option>
                </select>
            </div>
            <div class="col-auto d-flex align-items-center px-1 pr-3">
                <label class="text-secondary my-2 pr-2 view-opt-label">Sắp xếp</label>
                <select class="custom-select custom-select-sm btn my-2">
                    <option value="added-date-asc" selected>Ngày tạo</option>
                    <option value="due-date-desc">Ngày chỉnh sửa</option>
                </select>
                <i class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip"
                    data-placement="bottom" title="Ascending"></i>
                <i class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1 d-none" data-toggle="tooltip"
                    data-placement="bottom" title="Descending"></i>
            </div>
        </div>
        <!-- Todo list section -->
        <div class="row mx-1 px-5 pb-3 w-80">
            <div class="col mx-auto">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Tên nhiệm vụ

                            </th>
                            <th class="th-sm">Loại

                            </th>
                            <th class="th-sm">Người tạo

                            </th>
                            <th class="th-sm">Ngày tạo

                            </th>
                            <th class="th-sm">Trạng thái

                            </th>
                            <th class="th-sm">Thao tác

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todoList as $key => $list)
                        <tr>
                            <td>{{ $list->TaskName }}</td>
                            <td>
                                @foreach($typeTodo as $key => $listType)
                                @if($list->IdTypetodolist == $listType->id)
                                {{ $listType->Name }}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($accountTodo as $key => $account_todo)
                                @if($list->IdAccount == $account_todo->id)
                                {{ $account_todo->Username }}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                <?php
                                        if ($list->Status == 0) {
                                        ?>
                                <span class="material-icons done-styling">
                                    done
                                </span>

                                <?php
                                        } else if ($list->Status == 1) {
                                        ?>
                                <span class="material-icons undone-styling">
                                    clear
                                </span>
                                <?php
                                        }
                                        ?>
                            </td>
                            <td>{{ $list->CreatedAt }}</td>
                            <td>
                                <a type="button" href="{{ URL::to('/edit-todo/'.$list->id)}}" class="btn btn-primary px-3"><span class="material-icons">
                                        edit
                                    </span></a>
                                <a type="button" href="{{ URL::to('/delete-todo/'.$list->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa task này?')" class="btn btn-danger px-3"><span class="material-icons">
                                        delete
                                    </span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="th-sm">Tên nhiệm vụ

                            </th>
                            <th class="th-sm">Loại

                            </th>
                            <th class="th-sm">Người tạo

                            </th>
                            <th class="th-sm">Ngày tạo

                            </th>
                            <th class="th-sm">Trạng thái

                            </th>
                            <th class="th-sm">Thao tác

                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
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
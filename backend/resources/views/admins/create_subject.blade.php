@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Добавить предмета/дисциплину</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Empty</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6  col-xl-6">
            <div class="card">
                <form>
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Добавить</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputName">Наименование:</label>
                            <input type="text" class="form-control" id="InputName" name="name" placeholder="Физика или Знайка">
                        </div>
                        <div class="form-group">
                            <label for="InputDecription">Описание:</label>
                            <input type="text" class="form-control" id="InputDescription" name="description" placeholder="Наука об мире вокруг нас или Знать все и сразу ">
                        </div>

                        <div clas="form-group">
                            <label>Примичание:</label>
                            <div>
                                <a><i>Наименование должно быть уникальным. Справа указаны уже существующие предметы/дисциплины.</i></a>
                            </div>
                        </div>

                    
                    </div>
                    <div class="card-footer text-end">
                            <a href="javascript:void(0)" class="btn btn-primary">Создать</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6  col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Созданные</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Дейсвия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject as $item)
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary">Редактировать</a>
                                        <a href="javascript:void(0)" class="btn btn-danger">Архивировать</a>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
             
@endsection
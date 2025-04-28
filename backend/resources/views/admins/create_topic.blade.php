@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Добавить тему</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Empty</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Первичная информация</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="form-group">
                                <label for="Inputname">Наименование темы</label>
                                <input type="text" class="form-control" id="Inputname" name="name" placeholder="Тема">
                            </div>


                    </div>
                    <div class="form-group">
                        <label class="form-label">Предмет/дисциплина и класс</label>
                        <div class="row">
                            <div class="col-xl-8">
                                <select class="form-control select2 form-select">
                                        <option value="0">Предмет</option>
                                        -------
                                            <option value="1">valume</option>
                                        -------
                                    </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control select2 form-select">
                                        <option value="0">Класс</option>
                                        -------
                                            <option value="1">0</option>
                                        -------
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Описание или обучающий материал</h3>
                </div>
                <div class="card-body">
                    <textarea class="content" name="example" ></textarea>
                </div>
            </div>
        </div>
    </div>
            
    <div class="card">
        <div class="card-header">
            <div class="card-title">Создание теста</div>
        </div>
        <div class="card-body">
            
        </div>
        <div class="card-footer text-end">
            <a href="javascript:void(0)" class="btn btn-primary my-1">Deactivate</a>
            <a href="javascript:void(0)" class="btn btn-danger my-1">Delete Account</a>
        </div>
    </div>


@endsection

@section('scripts')
    <!-- INTERNAL WYSIWYG Editor JS -->
    <script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
    <script src="{{asset('assets/plugins/wysiwyag/wysiwyag.js')}}"></script>

    
@endsection
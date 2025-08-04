@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Добавить тему</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/topic">Мои темы</a></li>
                <li class="breadcrumb-item active" aria-current="page">Добавить тему</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <form class="needs-validation" action="{{ url()->route('topic.update', ['topicId' => $topic->id], false) }}" method="POST" novalidate autocomplete="on">
        @csrf
        @method('PUT') 
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Добавление новой темы</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label">Наименование темы</label>
                            <input type="text" class="form-control" name="topic_name" placeholder="Тема" required value="{{ $topic->title }}">
                            <div class="invalid-feedback">Пожалуйста введите наименование темы.</div> 
                        </div>
                        <div class="form-group">
                            <label class="form-label">Краткое описание темы</label>
                            <input type="text" class="form-control" name="topic_description" placeholder="Описание" value="{{ $topic->description }}" required>
                            <div class="invalid-feedback">Пожалуйста введите краткое описание темы.</div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="form-label">Предмет/дисциплина</label>
                                <select name="subject_select" class="form-control form-select" required>
                                    <option selected disabled value="">Выбирите предмет</option>
                                    @foreach ($subject as $item)
                                            <option value="{{$item->id}}" {{ $item->id == $topic->subject_id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Пожалуйста выберите предмет или дисциплину.</div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label">Класс</label>
                                <select name="class_select" class="form-control form-select" required>
                                    <option selected disabled value="">Выбирите класс</option>
                                    @foreach ($class as $item)
                                        <option value="{{$item->class_number}}" {{ $item->class_number == $topic->class_id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Пожалуйста выберите класс.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="form-label">Обучающий материал</label>
                        <textarea class="content" name="topic_content" >{{ $topic->content}}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="/admin/topic" class="btn btn-default">Назад</a>
                    <button type="submit" class="btn btn-success my-1 float-end">Изменить</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')

        <!-- INTERNAL WYSIWYG Editor JS -->
    <script src="{{secure_asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
    <script src="{{secure_asset('assets/plugins/wysiwyag/wysiwyag.js')}}"></script> 
    <!-- SELECT2 JS -->
    <script src="{{secure_asset('assets/plugins/select2/select2.full.min.js') }}"></script>

        <!-- FORMVALIDATION JS -->
    <script src="{{secure_asset('assets/js/form-validation.js') }}"></script>

        <!-- CUSTOM JS -->
    {{-- <script src="{{secure_asset('assets/js/custom.js') }}"></script> --}}
@endsection
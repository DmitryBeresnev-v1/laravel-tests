@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Информация о теме</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/topic">Мои темы</a></li>
                <li class="breadcrumb-item active" aria-current="page">Информация о теме</li>
            </ol>
        </div>
    </div>

        <div class="card">
            <div class="card-body">
                <div class="panel panel-primary">
                    <div class="tab-menu-heading tab-menu-heading-boxed">
                        <div class="tabs-menu-boxed">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs fs-14">
                                <li><a href="#activetabs" class="active" data-bs-toggle="tab">{{ $topic->title }}</a></li>
                                <li><a href="#linktabs" data-bs-toggle="tab">Тест/ы</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activetabs">
                                <h5 class="card-title">Зависимость:</h5>

                                <ol class="breadcrumb1"> 
                                    <li class="breadcrumb-item1">{{ $topic->class->name }}</li>
                                    <li class="breadcrumb-item1">{{ $topic->subject->name }}</li>
                                    <li class="breadcrumb-item1">{{ $topic->title }}</li>
                                </ol>
                                <h5 class="card-title">Содержание:</h5>
                                {!! $topic->description !!}
                                <br>
                                <div class="text-end">
                                    <a class="btn btn-primary" href="admin/test/id/update">Редактировать</a>
                                </div>
                            
                            </div>
                            <div class="tab-pane" id="linktabs">
                                <h5 class="card-title">Тесты к теме</h5>                                
                                    @if (!$hasTest)
                                        <div class="table-responsive">
                                            <table class="table text-nowrap text-md-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>№</th>
                                                        <th>Название</th>
                                                        <th>Автор</th>
                                                        <th>Вопросов</th>
                                                        <th class="align-middle text-center">Действия</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($topic->tests as $test)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $test->title }}</td>
                                                            <td>{{ $test->user->name }}</td>
                                                            <td>{{ $test->quest->count() }}</td>
                                                            <td class="text-center align-middle">
                                                                <div class="btn-group align-top">
                                                                    <a class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">Редактировать</a> <button class="btn btn-sm btn-primary badge" type="button"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                    @else
                                        <p>Нет тестов по этой теме.</p>
                                    @endif
                                <div class="text-end">
                                    <a class="btn btn-primary" href="/admin/topic/{{ $topic->id }}/test/create">
                                        <i class="fe fe-plus me-2"></i>
                                        Создать
                                    </a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

@endsection
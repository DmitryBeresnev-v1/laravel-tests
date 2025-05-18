@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Мои темы</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Мои темы</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Созданные темы</h3>
                    <div class="page-options ms-auto">
                        <a class="btn btn-primary" href="/admin/topic/create">
                            <i class="fe fe-plus me-2"></i>
                            Создать
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Класс</th>
                                    <th class="wd-15p border-bottom-0">Заголовок</th>
                                    <th class="wd-15p border-bottom-0">Тест</th>
                                    <th class="wd-15p border-bottom-0">Дата создания</th>
                                    <th class="align-middle text-center">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->topics as $topic)
                                    <tr>
                                        <td>{{ $topic->class->class_number}}</td>
                                        <td>{{ $topic->title}}</td>
                                        <td> 
                                            @if ($topic->tests != null)
                                                @foreach ($topic->tests as $test)
                                                   {{$test->title}} <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td><span>{{ $topic->created_at->locale('ru')->timezone('Europe/Moscow')->format('d/m/Y - H:i')}}</span></td>
                                        
                                        <form action="/admin/topic/{{ $topic -> id }}/delete" method="POST" style="display:inline">
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <a href="/admin/topic/{{ $topic->id }}" class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">Подробнее</a> 
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm btn-primary badge" type="submit" onclick="return confirm('Удалить тему и вложенные в нее тесты?')"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
@endsection

@section('scripts')
        <!-- DATA TABLE JS-->
        <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/js/table-data.js')}}"></script>

@endsection
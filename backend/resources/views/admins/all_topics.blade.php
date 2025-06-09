@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Все темы</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Все темы</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список тем</h3>
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
                                    <th class="wd-15p border-bottom-0">Предмет</th>
                                    <th class="wd-15p border-bottom-0">Заголовок</th>
                                    <th class="wd-15p border-bottom-0">Тест</th>
                                    <th class="wd-15p border-bottom-0">Автор</th>
                                    <th class="wd-15p border-bottom-0">Дата создания</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                 @foreach ($topic as $index)
                                    <tr>
                                        <td>{{ $index->class->class_number }}</td>
                                        <td>{{ $index->subject->name }}</td>
                                        <td>{{ $index->title }}</td>
                                        <td>{{ $index->tests->isNotEmpty() ? 'Есть' : 'Нету' }} </td>
                                        <td>{{ $index->user->name }}</td>
                                        <td><span>{{ $index->created_at->locale('ru')->timezone('Europe/Moscow')->format('d/m/Y - H:i') }}</span></td>                                        
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
        <script src="{{secure_asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{secure_asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{secure_asset('assets/js/table-data.js')}}"></script>

@endsection
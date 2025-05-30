@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Пользователи</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Все пользователи</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список пользователей</h3>
                    <div class="page-options ms-auto">
                        <a class="btn btn-primary" href="/admin/users/create">
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
                                    <th class="wd-15p border-bottom-0">id</th>
                                    <th class="wd-15p border-bottom-0">Ф.И.О.</th>
                                    <th class="wd-15p border-bottom-0">Логин</th>
                                    <th class="wd-15p border-bottom-0">Создано тем</th>
                                    <th class="wd-15p border-bottom-0">Создано тестов</th>
                                    <th class="align-middle text-center">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id}}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->login}}</td>
                                        <td>
                                            @if ($user->topics != null)
                                                {{ $user->topics->count() }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->tests != null)
                                                {{ $user->tests->count() }}
                                            @endif
                                        </td>

                                        <td class="text-center align-middle">
                                            <form action="/admin/users/{{ $user -> id }}/delete" method="POST" style="display:inline">
                                                <div class="btn-group align-top">
                                                    <a href="/admin/users/{{ $user->id }}/edit"class="btn btn-sm btn-primary badge" data-bs-toggle="" type="button">Подробнее</a> 
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm btn-primary badge" type="submit" onclick="return confirm('Удалить пользователя?')"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </td>
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
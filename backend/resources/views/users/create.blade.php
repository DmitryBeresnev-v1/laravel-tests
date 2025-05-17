@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Пользователи</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Создание пользователя</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('users.store') }}" method="POST">
        @csrf 
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Информация о пользователе</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="user_name" placeholder="Фамилия Имя" required>
                            <div class="invalid-feedback">Пожалуйста введите наименование темы.</div> 
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Login</label>
                                    <input type="text" class="form-control" name="user_login" placeholder="login">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="user_password" placeholder="password">
                                </div>
                            </div>
                        </div>
                </div>

                <div class="card-footer">
                    <a href="/admin/users" class="btn btn-default">Назад</a>
                    <button type="submit" class="btn btn-success my-1 float-end">Создать</button>
                </div>
            </div>
        </form>
    </div>

           
@endsection

@section('scripts')

@endsection
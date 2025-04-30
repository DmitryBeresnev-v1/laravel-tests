@extends ('layouts.main')

@section ('content')
    <!--app-content open-->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Ваши созданные темы</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Доска</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ваши созданные темы</li>
            </ol>
        </div>
    </div>

    <div class="row row-cards">
        <div class="col-lg-12 col-xl-12">      
            <div class="card">
                <div class="card-header border-bottom-0">
                    <h2 class="card-title">1 - 30 of 546 users</h2>
                    <div class="page-options ms-auto">
                        <select class="form-control select2 w-100">
                                <option value="asc">Latest</option>
                                <option value="desc">Oldest</option>
                            </select>
                    </div>
                </div>
                <div class="e-table px-5 pb-5">
                    <div class="table-responsive table-lg">
                        <table class="table border-top table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">

                                    </th>
                                    <th class="text-center">Photo</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center">
                                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                            <input class="custom-control-input" id="item-1" type="checkbox"> <label class="custom-control-label" for="item-1"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center"><img alt="image" class="avatar avatar-md br-7" src="../assets/images/users/16.jpg"></td>
                                    <td class="text-nowrap align-middle">Adam Cotter</td>
                                    <td class="text-nowrap align-middle"><span>09 Dec 2017</span></td>

                                    <td class="text-center align-middle">
                                        <div class="btn-group align-top">
                                            <button class="btn btn-sm btn-primary badge" data-target="#user-form-modal" data-bs-toggle="" type="button">Edit</button> <button class="btn btn-sm btn-primary badge" type="button"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        
@endsection

@section('scripts')
    
@endsection
@extends ('layouts.main')

@section ('content')
        <div class="page-main">

    
                        <!-- ROW OPEN -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Cutom Validation</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="validationCustom01">First name</label>
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        value="Mark" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="validationCustom02">Last name</label>
                                                    <input type="text" class="form-control" id="validationCustom02"
                                                        value="Otto" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="validationCustom03">City</label>
                                                    <input type="text" class="form-control" id="validationCustom03"
                                                        required>
                                                    <div class="invalid-feedback">Please provide a valid city.</div>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label for="validationCustom04">State</label>
                                                    <select class="form-control select2" id="validationCustom04"
                                                        required>
                                                        <option selected disabled value="">U.S.A</option>
                                                        <option>New york</option>
                                                        <option>New york</option>
                                                        <option>New york</option>
                                                        <option>New york</option>
                                                        <option>New york</option>
                                                        <option>New york</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid state.</div>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label for="validationCustom05">Zip</label>
                                                    <input type="text" class="form-control" id="validationCustom05"
                                                        required>
                                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">Agree to terms and
                                                        conditions</label>
                                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- ROW CLOSED -->
                    </div>
@endsection

@section('scripts')


   



   

@endsection
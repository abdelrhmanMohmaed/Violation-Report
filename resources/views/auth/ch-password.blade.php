@extends('layout')
@section('title')
    Change Password
@endsection
@section('main')
    <!-- Main content -->
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-9">
            <div class="card text-white bg-info">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- start form start to change password  -->
                <form method="POST" action="{{ url('reports-list/change-update') }}">

                    <div class="card-body my-3">
                        @include('web.inc.messages')
                        @csrf
                        <div class="form-group  ">
                            <label for="exampleInputEmail1">Current Password</label>
                            <input type="password" name="oldPassword" class="form-control" id="exampleInputEmail1"
                                required>
                        </div>
                        <div class="form-group my-4">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" name="newPassword" class="form-control" id="exampleInputEmail1"
                                required>
                        </div>
                        <div class="form-group my-4">
                            <label for="exampleInputPassword1">New Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="exampleInputPassword1" required>
                        </div>
                        <div class=" d-flex flex-row-reverse bd-highlight ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
                <!-- end form start to change password  -->
            </div>
        </div>
    </div>
@endsection

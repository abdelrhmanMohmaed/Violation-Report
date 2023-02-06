@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            Add User
                        </strong>
                    </div>
                    <div class="card-body"> 
                        <div class="row">
                            <form method="post" action="{{ route('user.store') }}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter name">
                                        @error('name')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        @error('email')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password"
                                            placeholder="Password Confirm">
                                        @error('password_confirmation')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

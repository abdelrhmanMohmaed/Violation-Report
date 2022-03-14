@extends('layout')
@section('title')
    Sign In
@endsection
@section('main')
    <div class="content d-flex justify-content-center my-5">
        <div class="col-md-8">
            <div class="card text-white bg-primary my-5 ">
                <div class="card-header">
                    <h3 class="card-title">Health & Safety System Login</h3>
                </div>
                <!-- /.card-header -->
                {{-- @include('web.inc.messages') --}}

                <!-- form start -->
                <form method="POST" action="{{ url('login') }}" class="form-horizontal">
                    @csrf

                    <div class="card-body my-3">
                        <div class="form-group row mb-3">
                            <div class="col-sm-12">
                                <div class="">
                                    <label for="inputEmail3" class="">Seel code</label>
                                    <input name="seel_code" type="number" class="form-control" id="inputEmail3"
                                        placeholder="Seel code" min="4" required>
                                </div>
                                @error('seel_code')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-dark">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="">
                                    <label for="inputPassword3" class="">Password</label>
                                    <input name="password" type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password" required>
                                </div>
                                @error('password')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-dark">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}
                                    </span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex flex-row-reverse bd-highlight ">
                        <button type="submit" class="btn btn-info float-right mb-2">Sign in</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection

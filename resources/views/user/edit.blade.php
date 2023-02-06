@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            User: {{ $user->name }}
                            @if (in_array(Auth::user()->id, [1, 3]))
                                <a href="{{ route('user.new') }}" class="btn btn-sm btn-light float-end" type="submit">
                                    Add User
                                </a>
                            @endif
                        </strong>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <form action="{{ route('user.update', $user->id) }}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" disabled value="{{ $user->email }}"
                                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Enter email">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12  mt-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

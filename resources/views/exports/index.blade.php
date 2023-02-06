@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong>
                            <i class="fa-solid fa-filter"></i>
                            Filter
                        </strong>
                    </div>
                    <div class="card-body">
                        @include('sweetalert::alert')

                        <div class="row">
                            <form action="{{ url('export/details') }}" method="get" class="mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">From</label>
                                            <input type="date" id="from" class="form-control" name="from">
                                        </div>
                                        @error('from')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="font-weight-bold">To</label>
                                            <input type="date" id="to" class="form-control" name="to">
                                        </div>
                                        @error('to')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-primary">Export</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

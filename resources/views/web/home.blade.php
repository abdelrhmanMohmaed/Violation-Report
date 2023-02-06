@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card">
                    <div class="card-header bg-info"><strong>Violation Report</strong></div>
                    @include('sweetalert::alert')
                    <div class="card-body">
                        <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row py-2">
                                {{-- count in Db --}}
                                <div class="col-md-6">
                                    <div>
                                        <strong>Violation Number : </strong> {{ date('Y') }} -
                                        <span>{{ $reports->id ?? 'No report created late' }}</span>
                                        <span></span>
                                    </div>
                                </div>
                                {{-- Seel --}}
                                <div class="col-md-6">
                                    <div>
                                        <strong>SEEL # :</strong>
                                        <select name="seel_id" class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                            <option disabled selected>Open this select menu</option>
                                            @foreach ($seels as $seel)
                                                <option value="{{ $seel->id }}">{{ $seel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('seel_id')
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-2">
                                {{-- cat --}}
                                <div class="col-md-6">
                                    <div>
                                        <strong>Category : </strong>
                                        <select name="category_id"
                                            class="form-select js-example-basic-single form-select-sm"
                                            aria-label=".form-select-sm example">
                                            <option disabled selected>Open this select menu</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- areas --}}
                                <div class="col-md-6">
                                    <div>
                                        <strong>Area :</strong>
                                        <select name="area_id"
                                            class="form-select form-select-sm js-example-basic-single js-states form-control"
                                            aria-label=".form-select-sm example">
                                            <option disabled selected>Open this select menu</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('area_id')
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-2">
                                {{-- desc --}}
                                <div class="col-md-12">
                                    <div>
                                        <strong>Description : </strong>
                                        <textarea name="description" class="form-control" value="{{ old('description') }}" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                                @error('description')
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row py-2">
                                {{-- action --}}
                                <div class="col-md-12">
                                    <div>
                                        <strong>Recommended Action : </strong>
                                        <textarea name="recommended_action" class="form-control" value="{{ old('recommended_actionca') }}"
                                            aria-label="With textarea"></textarea>
                                    </div>
                                    @error('recommended_action')
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-2">
                                {{-- target_date --}}
                                <div class="col-md-6">
                                    <div>
                                        <strong>Target Date : </strong>
                                        <input class="form-control" value="{{ now()->format('Y-m-d') }}" type="date"
                                            name="target_Date" id="date">
                                    </div>
                                    @error('target_Date')
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- image --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Upload Photo</strong>
                                        <div class="input-group">
                                            <input type="file" name="img" class="form-control">
                                        </div>
                                    </div>
                                    @error('img')
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-2">
                                {{-- principal --}}
                                <div class="col-md-6">
                                    <div>
                                        <strong>Receipt Name :</strong>
                                        <select name="principal_id"
                                            class="form-select js-example-basic-single form-select-sm"
                                            aria-label=".form-select-sm example">
                                            <option disabled selected>Open this select menu</option>
                                            @foreach ($principals as $principal)
                                                <option value="{{ $principal->id }}">{{ $principal->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('principal_id')
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- <div class="form-group mt-4 float-start">
                                        <input class="form-check-input" type="checkbox" name="receipt_confirmation"
                                            value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <strong>&nbsp;Receipt Confirmation</strong>
                                        </label>
                                    </div> --}}
                                    <div class="form-group mt-3 float-end">
                                        <button id="submit-btn" class=" btn btn-info" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
@endsection

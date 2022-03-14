@extends('layout')
@section('title')
    Edit-Report
@endsection
@section('main')
    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header text-center">Edit Violation Report</h5>
            <div class="card-body">
                @foreach ($reports as $report)
                    <form action="{{ url("reports-list/update-report/$report->id") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('web.inc.messages')

                        <div class="row py-2">
                            {{-- count in Db --}}
                            <div class="col-md-6">
                                <div>
                                    <strong>Violation Number : </strong>
                                    <span>{{ $report->id }}</span>
                                </div>
                            </div>
                            {{-- Seel --}}

                            <div class="col-md-6">
                                <div>
                                    <strong>SEEL # :</strong>
                                    <select name="seel" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option selected disabled value="{{ $report->seel }}">
                                            {{ $report->seel }}
                                        </option>
                                        <option value="SEEL 1">SEEL 1</option>
                                        <option value="SEEL 2">SEEL 2</option>
                                        <option value="SEEL 3">SEEL 3</option>
                                        <option value="SEEL 4">SEEL 4</option>
                                        <option value="SEEL 5">SEEL 5</option>
                                    </select>
                                </div>
                                @error('seel')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                        </div>
                        <div class="row py-2">
                            {{-- cat --}}
                            <div class="col-md-6">
                                <div>
                                    <strong>Category : </strong>
                                    <select name="cat" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option disabled selected value="{{ $report->category }}">
                                            {{ $report->category }}
                                        </option>
                                        <option value="5s">5s</option>
                                        <option value="Noise">Noise</option>
                                        <option value="Vibration">Vibration</option>
                                        <option value="Radiation">Radiation</option>
                                        <option value="Mental ill health">Mental ill-health</option>
                                        <option value="Violence at work">Violence at work</option>
                                        <option value="Substance abuse at work">Substance abuse at work</option>
                                        <option value="Work related upper-limb">Work related upper-limb</option>
                                        <option value="Hazardous substance">Hazardous substance</option>
                                        <option value="Health">Health</option>
                                        <option value="Welfare and work environmental">Welfare and work environmental
                                        </option>
                                        <option value="Working at height">Working at height</option>
                                        <option value="Movement of people and vehicles">Movement of people and vehicles
                                        </option>
                                        <option value="Work related drive">Work related drive </option>
                                        <option value="Work equipment and machinery">Work equipment and machinery</option>
                                        <option value="Fire">Fire</option>
                                        <option value="Electricity">Electricity</option>
                                    </select>
                                </div>
                                @error('cat')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                            {{-- areas --}}
                            <div class="col-md-6">
                                <div>
                                    <strong>Area :</strong>
                                    <select name="areas" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option disabled selected value="{{ $report->area }}">
                                            {{ $report->area }}
                                        </option>
                                        <option value="Injection">Injection</option>
                                        <option value="Tooling">Tooling</option>
                                        <option value="IMD area">IMD area</option>
                                        <option value="Sludge area">Sludge area</option>
                                        <option value="Electricity Rooms">Electricity Rooms</option>
                                        <option value="Maintenance Room">Maintenance Room</option>
                                        <option value="Resin Stores">Resin Stores</option>
                                        <option value="Corridor">Corridor</option>
                                        <option value="Warehouse">Warehouse</option>
                                        <option value="Software developer">Software developer</option>
                                        <option value="Customer Services ">Customer Services </option>
                                        <option value="HR">HR</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Procurement">Procurement</option>
                                        <option value="Paint line">Paint line</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Jigging">Jigging</option>
                                        <option value="CNC">CNC</option>
                                        <option value="Metrology&Calibration">Metrology & Calibration</option>
                                        <option value="X-ray">X-ray</option>
                                        <option value="Assembly">Assembly</option>
                                        <option value="Heatronic">Heatronic</option>
                                        <option value="Mezzanine">Mezzanine</option>
                                        <option value="Miscellaneous">Miscellaneous</option>
                                        <option value="Production Offices">Production Offices</option>
                                        <option value="Engineering Offices">Engineering Offices</option>
                                        <option value="IT Offices ">IT Offices </option>
                                    </select>
                                </div>
                                @error('areas')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                        </div>
                        <div class="row py-2">
                            {{-- desc --}}
                            <div class="col-md-12">
                                <div>
                                    <strong>Description : </strong>
                                    <textarea name="desc" class="form-control" aria-label="With textarea">{{ $report->description }}</textarea>
                                </div>
                            </div>
                            @error('desc')
                                {{-- <div class="alert-danger"> --}}
                                <span class="text-danger">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                                {{-- </div> --}}
                            @enderror
                        </div>
                        <div class="row py-2">
                            {{-- action --}}
                            <div class="col-md-12">
                                <div>
                                    <strong>Recommended Action : </strong>
                                    <textarea name="action" class="form-control"
                                        aria-label="With textarea">{{ $report->recommended_action }}</textarea>
                                </div>
                                @error('action')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                        </div>
                        <div class="row py-2">
                            {{-- target_date --}}
                            <div class="col-md-6">
                                <div>
                                    <strong>Target Date : </strong>
                                    <input class="form-control" type="date" value="{{ $report->target_Date }}"
                                        name="target_date" id="date">
                                </div>
                                @error('target_date')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                            {{-- image --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Upload Photo</strong>
                                    <div class="input-group">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                @error('image')
                                    {{-- <div class="alert-danger"> --}}
                                    <span class="text-danger">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}</span>
                                    {{-- </div> --}}
                                @enderror
                            </div>
                        </div>
                        <div class="row py-2">
                            {{-- leader --}}
                            <div class="col-md-6">
                                <div>
                                    <strong>Receipt Name :</strong>
                                    <select name="leader" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">

                                        <option disabled selected value="{{ $report->principal->id }}">
                                            {{ $report->principal->name }}</option>

                                        @foreach ($principals as $principal)
                                            <option value="{{ $principal->id }}">{{ $principal->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('leader')
                                        {{-- <div class="alert-danger"> --}}
                                        <span class="text-danger">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</span>
                                        {{-- </div> --}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3 float-end">
                                    <button id="submit-btn" class=" btn btn-info" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection

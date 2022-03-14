@extends('layout')
@section('title')
   Filte Reports List
@endsection

@section('main')
    {{-- start table --}}
    <div class="m-2">
        <table class="table table-striped mt-2">
            <h3>Filter Reports List</h3>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Seel</th>
                    <th>Area</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Recommended Action</th>
                    <th>Target Date</th>
                    <th>Photo</th>
                    <th>Created At</th>
                    <th>Receipt Name</th>
                    <th>Receipt Confirmation</th>
                </tr>
            </thead>
            <tbody>
                @include('web.inc.messages')

                {{-- start for loop to set all parts in db --}}
                @foreach ($reborts as $rebort)
                    {{-- start check status in report active or closed and display active --}}
                    @if ($rebort->status == true)
                        <tr>
                            <th scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td>
                                {{ $rebort->seel }}
                            </td>
                            <td>
                                {{ $rebort->area }}
                            </td>
                            <td>
                                {{ $rebort->category }}
                            </td>
                            <td>
                                {{ $rebort->description }}
                            </td>
                            <td>
                                {{ $rebort->recommended_action }}
                            </td>
                            <td>
                                {{ $rebort->target_Date }}
                            </td>
                            <td>
                                <img class="img" src="{{ asset("uploads/img-report/$rebort->img") }}" alt=""
                                    srcset="">
                            </td>
                            <td>
                                {{ substr($rebort->created_at, 0, 11) }}
                            </td>
                            <td>
                                {{ $rebort->principal->name }} - {{ $rebort->principal->seel_code }}
                            </td>
                            <td class="text-cente">
                                <div class="btn-group-toggle">
                                    @if ($rebort->receipt_confirmation == false)
                                        <a class="btn btn-sm btn-warning m-1" title="Edit"
                                            href="{{ url("reports-list/edit-report/$rebort->id") }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-sm btn-primary m-1" title="Confirmation"
                                            href="{{ url("reports-list/toggle/confirm/$rebort->id") }}">
                                            <i class="fa-solid fa-share-from-square"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger m-1" title="Delete"
                                            href="{{ url("reports-list/delete/$rebort->id") }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-sm btn-info m-1" title="Close"
                                        href="{{ url("reports-list/toggle/status/$rebort->id") }}">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                    {{-- end check status in report active or closed and display active --}}
                @endforeach
                {{-- end for loop --}}
            </tbody>
        </table>
        <!-- Button trigger modal -->
    </div>
    {{-- end to table --}}
@endsection 

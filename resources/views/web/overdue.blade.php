@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5 mt-5">
        @include('sweetalert::alert')
        <div class="card row justify-content-center">
            <h5 class="card-header bg-info">
                <i class="fa fa-file" aria-hidden="true"></i>
                Overdue Report
            </h5>
            <div class="card-body p-3">

                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reported to</th>
                            <th>Issuer</th>
                            <th>Seel</th>
                            <th>Area</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Recommended Action</th>
                            <th>Target Date</th>
                            <th>Image</th>
                            <th>Receipt Confirmation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->principal->name }}</td>
                                <td>{{ $item->reported_by }}</td>
                                <td>{{ $item->seel->name }}</td>
                                <td>{{ $item->area->name }}</td>
                                <td>{{ $item->cat->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->recommended_action }}</td>
                                <td>{{ $item->target_Date }}</td>
                                @if ($item->img)
                                   <td>
                                        <img class="img border rounded border-white" src="{{ asset("$item->img") }}"
                                            alt="Violation Image" type="button" data-bs-toggle="modal"
                                            data-bs-target="#ImgModal" data-img={{ asset("$item->img") }}
                                            style="height: 50px; width:50px" srcset="">
                                    </td>
                                @else
                                    <td><strong>No Image</strong></td>
                                @endif
                                @if ($item->receipt_confirmation == 1)
                                    <td><strong>Receipt Confirmation</strong></td>
                                @else
                                    <td><strong>Not Receipt Confirmation</strong></td>
                                @endif
                                <td class="text-cente">
                                    <div class="btn-group-toggle">
                                        @if ($item->receipt_confirmation == 0)
                                            <a class="btn btn-sm btn-warning m-1" title="Edit"
                                                href="{{ route('report.edit', $item->id) }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a class="btn btn-sm btn-primary m-1" title="Confirmation"
                                                href="{{ route('report.confirm', $item->id) }}">
                                                <i class="fa-solid fa-share-from-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger m-1" data-bs-toggle="modal"
                                                data-bs-target="#DeleteModal" class="btn btn-danger"
                                                data-report_id={{ $item->id }}>
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        @endif
                                        <a class="btn btn-sm btn-info m-1" title="Close"
                                            href="{{ route('report.close', $item->id) }}">
                                            <i class="fa-regular fa-eye-slash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modals -->
        @include('inc.models')

    </div>
@endsection

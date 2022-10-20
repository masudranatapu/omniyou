@extends('admin.layouts.app')
@section('title', 'Worker Details')
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <style>
        .btn-group ul {
            left: 38% !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Worker Details</h3>
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <a href="{{ route('admin.worker.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped w-50">
                        <tr>
                            <td class="w-25"> Worker Name</td>
                            <td> {{ $worker->name }}</td>
                        </tr>
                        <tr>
                            <td class="w-25"> Worker Email</td>
                            <td> {{ $worker->email }}</td>
                        </tr>
                        <tr>
                            <td class="w-25">Initial Password</td>
                            <td> {{ $worker->str_pass }}</td>
                        </tr>
                        <tr>
                            <td class="w-25">Worker Status</td>
                            <td>
                                @if ($worker->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div class="card-header mb-4">
                        <h6>Assigned Client</h6>
                    </div>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table responsive">
                            <thead>
                                <tr >
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Status</th>
                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $key => $row)
                                    <tr  class="text-center">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->name }} </td>
                                        <td>{{ $row->email }} </td>
                                        <td>{{ $row->phone }} </td>
                                        <td>{{ $row->address }} </td>
                                        <td>{{ date_format(date_create($row->created_at), 'd, M Y') }} </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        {{-- <td class="text-center">
                                            <a href="{{ route('admin.client.edit', $row->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <div><i class="fa fa-pencil"></i></div>
                                            </a>
                                            <a href="{{ route('admin.client.delete', $row->id) }}"
                                                class="btn btn-danger btn-icon" id="delete">
                                                <div><i class="fa fa-trash"></i></div>
                                            </a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div><!-- card-body -->
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script>
        $(document).ready(function() {
            $('#multiple_checkboxes').multiselect({
                includeSelectAllOption: true,
                buttonWidth: '100%',
            });
        });
    </script>
@endsection

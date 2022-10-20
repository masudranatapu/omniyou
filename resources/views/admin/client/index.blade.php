@extends('admin.layouts.app')
@section('title', 'Client List')
@section('course_actice') active @endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Client List</h3>
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <a href="{{ route('admin.client.create') }}" class="btn btn-primary">Add Client</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Worker</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $key => $row)
                                    <tr class="text-center">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->name }} </td>
                                        <td>{{ $row->email }} </td>
                                        <td>{{ $row->phone }} </td>
                                        <td>{{ $row->address }} </td>
                                        <td>
                                            @if ($row->worker_id)
                                                <a href="{{ route('admin.worker.show', $row->worker_id) }}"
                                                    class="text-info">{{ $row->worker_name }} </a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        {{-- <td>{{ date_format(date_create($row->created_at), 'd, M Y') }} </td> --}}
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.client.edit', $row->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <div><i class="fa fa-pencil"></i></div>
                                            </a>
                                            <a href="{{ route('admin.client.delete', $row->id) }}"
                                                class="btn btn-danger btn-icon" id="delete">
                                                <div><i class="fa fa-trash"></i></div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div>
            </div>
        </div>
    </div>

@endsection

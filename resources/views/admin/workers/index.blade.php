@extends('admin.layouts.app')
@section('title', 'Workers')
@section('course_actice') active @endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Workers List</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('admin.worker.create') }}" class="btn btn-primary">Add Worker</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Workers List</h6>
                </div>
                <div class="card-body">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    {{-- <th class="text-center">client</th> --}}
                                    <th class="text-center">Initial Password</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workers as $key => $row)
                                    <tr class="text-center">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->name }} </td>
                                        <td>{{ $row->email }} </td>
                                        {{-- <td>
                                            @if ($row->client_id != '')
                                                @foreach (json_decode($row->client_id) as $item)
                                                    @php
                                                        $client = DB::table('clients')
                                                            ->where('id', $item)
                                                            ->first();
                                                    @endphp
                                                    <span class="badge badge-primary">
                                                        {{ $client->name }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td> --}}
                                        <td>{{ $row->str_pass }} </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.worker.edit', $row->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <div><i class="fa fa-pencil"></i></div>
                                            </a>
                                            <a href="{{ route('admin.worker.delete', $row->id) }}"
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
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script>
        $(document).ready(function() {
            $('#multiple_checkboxes').multiselect({
                includeSelectAllOption: true,
                buttonWidth: '100%',
            });
            $(".multiselect-container").css('left', '38%');
            // $(".caret").css('margin', '8px 0');
        });
    </script>
@endsection

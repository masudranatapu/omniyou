@extends('admin.layouts.app')
@section('title', 'Workers')
@section('course_actice') active @endsection
@section('content')
    <div class="card mb-4">
        <div class="row card-header ">
            <div class="col-6">
                <div class="page_title">
                    <h3>Workers List</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('admin.worker.create') }}" class="btn-sm btn btn-primary">Add Worker</a>
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
                                    <th class="text-center">Current Survey</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workers as $key => $row)
                                    <tr >
                                        <td>{{ ++$key }}</td>
                                        <td>#W{{ $row->code }} - {{ $row->name }} </td>
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
                                        <td class="text-center"> {{ $row->str_pass }} </td>
                                        <td class="text-center">
                                            @if ($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->survey_name }}</td>
                                        <td class="text-center">
                                            @if($row->survey_name)
                                                <a title="Add users" href="{{ route('admin.serveyuser', [$row->id,$row->running_survey_id]) }}"
                                                    class="btn-sm btn btn-success btn-icon">
                                                    <div><i class="fa fa-plus"></i></div>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.worker.show', $row->id) }}"
                                                class="btn-sm btn btn-primary btn-icon">
                                                <div><i class="fa fa-eye"></i></div>
                                            </a>
                                            <a href="{{ route('admin.worker.edit', $row->id) }}"
                                                class="btn-sm btn btn-info btn-icon">
                                                <div><i class="fa fa-pencil"></i></div>
                                            </a>
                                            <a href="{{ route('admin.worker.delete', $row->id) }}"
                                                class="btn-sm btn btn-danger btn-icon" id="delete">
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

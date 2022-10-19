@extends('admin.layouts.app')
@section('title', 'Survey List')
@section('survey_active') active @endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Survey List</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('admin.survey.create') }}" class="btn btn-primary">Add Survey</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Survey List</h6>
                </div>
                <div class="card-body">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Survey Name</th>
                                    <th class="text-center">Survey Date</th>
                                    <th class="text-center">Questions</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($survey as $key => $row)
                                    <tr class="text-center">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->name }} </td>
                                        <td>{{ date_format(date_create($row->date), 'd, M Y') }} </td>
                                        <td>
                                            @if ($row->question_ids)
                                                @php
                                                    $questions = DB::table('quiz_questions')
                                                        ->whereIn('id', json_decode($row->question_ids))
                                                        ->get();
                                                @endphp
                                                @foreach ($questions as $item)
                                                    <span class="badge bg-info">{{ $item->question }}</span>
                                                @endforeach
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
                                            <a href="{{ route('admin.survey.edit', $row->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <div><i class="fa fa-pencil"></i></div>
                                            </a>
                                            <a href="{{ route('admin.survey.delete', $row->id) }}"
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

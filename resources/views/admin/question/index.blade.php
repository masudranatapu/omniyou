@extends('admin.layouts.app')

@section('title', 'Quiz - Questions List')

@section('qus_active') active @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Questions List</h3>
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <a href="{{ route('question.create') }}" class="btn btn-primary">Add Question</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table responsive">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Question</th>
                                    <th>Question Type</th>
                                    <th>Question Options</th>
                                    {{-- <th>Answer</th> --}}
                                    <th>Order Number</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                    <th width="10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->question }} </td>
                                        <td>
                                            @if ($row->question_type == 1)
                                                <span>Multiple choose, answer single</span>
                                            @else
                                                <span>Free writing answer </span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $option = App\Models\QuizOption::where('question_no', $row->id)->get();
                                            @endphp
                                            @foreach ($option as $item)
                                                {{ $loop->iteration }}. <span>{{ $item->answer_option }}</span><br />
                                            @endforeach
                                        </td>
                                        {{-- <td>
                                            @php
                                                $answer = App\QuizAnswer::where('question_no', $row->id)->first();
                                            @endphp
                                            <span>{{ $answer->answer ?? '' }}</span>
                                        </td> --}}
                                        <td>{{ $row->order_id }} </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($row->question_type == 1)
                                                <a href="{{ route('quizOptions.create', $row->id) }}"
                                                    class="btn btn-primary btn-icon">
                                                    <div><i class="fa fa-pencil"></i></div>
                                                </a>
                                            @else
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('question.edit', $row->id) }}"
                                                class="btn btn-primary btn-icon">
                                                <div><i class="fa fa-edit"></i></div>
                                            </a>
                                            <a href="{{ route('question.destroy', $row->id) }}"
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

@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="box_wrapper question_ans">
                @foreach ($quiz as $item)
                    <form action="{{ route('free-writing-ans') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <h4><strong>Question:</strong> {{ $item->question }}</h4>
                            <input type="hidden" name="quiz_question_id" value="{{ $item->id }}">
                        </div>
                        @php
                            $answer = App\UserFreeWritingAns::where('interview_user_id', Session::get('interview_user_id'))
                                ->where('quiz_question_id', $item->id)
                                ->first();
                            $others_ans = App\UserFreeWritingAns::where('interview_user_id', '!=', Session::get('interview_user_id'))
                                ->where('quiz_question_id', $item->id)
                                ->OrderBy('id', 'desc')
                                ->get();
                            $answer_given = App\QuizAnswer::where('question_no', $item->id)->first();
                        @endphp
                        <div class="row g-4 mb-4">
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <span style="color: rgb(29 51 84)">Your Answer : {!! $answer->answer ?? '' !!}</span> <br />
                                    {{-- <span style="color: green">Correct Answer : {!! $answer_given->answer ?? '' !!}</span>
                                    <textarea name="answer" id="answer" cols="20" rows="5" class="form-control" required>{!! $answer->answer ?? '' !!}</textarea> --}}
                                    <b>Others Anser</b> <br />
                                    @foreach ($others_ans as $ans)
                                        @php
                                            $o_answer = App\UserFreeWritingAns::where('interview_user_id', $ans->interview_user_id)
                                                ->where('quiz_question_id', $item->id)
                                                ->first();
                                        @endphp
                                        <span style="color:blue">{{ $ans->interview_user->name ?? '' }}</span><br />
                                        <span>Ans :{!! $o_answer->answer ?? '' !!}</span><br />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
                <div class="box_wrapper success_page">
                    <div class="mt-5 text-center">
                        <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
                        <a href="{{ route('see-others-answer') }}" class="btn btn-primary">See Others Ans</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

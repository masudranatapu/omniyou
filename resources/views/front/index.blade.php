@extends('layouts.app')
@section('content')
    <style>
        #progressBar {
            width: 90%;
            margin: 10px auto;
            height: 22px;
            background-color: #0A5F44;
        }

        #progressBar div {
            height: 100%;
            text-align: right;
            padding: 0 10px;
            line-height: 22px;
            /* same as #progressBar height if we want text middle aligned */
            width: 0;
            background-color: #CBEA00;
            box-sizing: border-box;
        }
    </style>
    {{-- <div id="progressBar">
        <div id="timer_count_pr"></div>
    </div> --}}
    <div class="row d-flex justify-content-center">
        <div class="col-xl-9">
            <div class="box_wrapper question_ans" style="background: black">

                @foreach ($quiz as $item)
                    @php
                        $options = App\QuizOption::where('question_no', $item->id)->get();
                    @endphp
                    <form action="{{ route('start-quiz-answer') }}" method="post">
                        @csrf

                        <input type="hidden" name="quiz_question_id" value="{{ $item->id }}">
                        <div class="timer_seconds">
                            <div class="float-end timer_count text-center">
                                <h5 id="timer"></h5>
                                <span style="color: #fff">Timer Seconds</span>
                            </div>
                            <span id="timer_end"></span>
                        </div>
                        <div class="mb-4">
                            <h4 style="color: #fff">{{ $item->question }}</h4>
                        </div>
                        @php
                            $answer = App\UserQuizAnswer::where('interview_user_id', Session::get('interview_user_id'))
                                ->where('quiz_question_id', $item->id)
                                ->first();
                        @endphp
                        <div class="row g-4">
                            @foreach ($options as $ques)
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $ques->id }}"
                                            name="quiz_answer_id" id="ans{{ $ques->id }}" required>
                                        <input type="hidden" value="{{ $step }}" name="step_id">
                                        <label class="form-check-label" for="ans{{ $ques->id }}"
                                            style="color: #fff">{{ $ques->answer_option }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </form>
                @endforeach
                {{-- @foreach ($quiz as $item)
                    <form action="{{ route('start-quiz-answer-skip') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <input type="hidden" name="quiz_question_id" value="{{ $item->id }}">
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-info float-end" style="margin-right: 10px;">Skip</button>
                        </div>
                    </form>
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
@php
    $step;
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Timer Counter -->
<script>
    $(document).ready(function() {
        var time_limit = 30;
        var time_out = setInterval(() => {
            if (time_limit == 0) {
                $('.timer_count').addClass('d-none');
                $('#timer_end').html('Time Over');
                window.location.href = "{{ route('quiz.step.two', $step) }}";
            } else {
                if (time_limit < 10) {
                    time_limit = 0 + '' + time_limit;
                }
                $('#timer').html(time_limit);
                time_limit -= 1;
            }
        }, 1000);
    })
</script>

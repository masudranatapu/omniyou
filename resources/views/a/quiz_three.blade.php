@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-xl-9">
        <div class="box_wrapper question_ans">
            @foreach ($quiz as $item)
            <form action="{{route('free-writing-ans')}}" method="post">
                @csrf
                <div class="mb-4">
                    <h4>{{$item->question}}</h4>
                    <input type="hidden" name="quiz_question_id" value="{{$item->id}}">
                </div>
                @php
                     $answer = App\UserFreeWritingAns::where('interview_user_id',Session::get('interview_user_id'))->where('quiz_question_id',$item->id)->first();
                 @endphp
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="form-check">
                            <textarea name="answer" id="answer" cols="20" rows="5" class="form-control" required>{!! $answer->answer ?? '' !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>  
            @endforeach
            @foreach ($quiz as $item)
            <form action="{{route('free-writing-skip')}}" method="post">
                @csrf
                <div class="mb-4">
                    <input type="hidden" name="quiz_question_id" value="{{$item->id}}">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-info float-end" style="margin-right: 10px;">Skip</button>
                </div>
            </form>  
            @endforeach
        </div>
        
    </div>
</div>
@endsection
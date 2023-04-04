@extends('admin.layouts.app')
@section('title', 'AB - Admin Dashboard')
@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header page_title">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-12">
            <div class="row ">
                <div class="col-md-3 mb-2">
                    <a href="{{ route('quiz.index') }}" class="shortcut-icon">
                        <div>
                            <i class="icon ion-ios-analytics"></i>
                            <h5>{{ $users ? $users : 0 }}</h5>
                            <span>Assesment</span>
                        </div>
                    </a>
                </div><!-- col -->
                <div class="col-md-3">
                    <a href="{{ route('question.index') }}" class="shortcut-icon">
                        <div>
                            <i class="icon ion-ios-help"></i>
                            <h5>{{ $questions ? $questions : 0 }}</h5>
                            <span>Total Question</span>
                        </div>
                    </a>
                </div><!-- col -->
                <div class="col-md-3 mb-2">
                    <a href="{{ route('admin.client.index') }}" class="shortcut-icon">
                        <div>
                            <i class="icon ion-ios-person"></i>
                            <h5>{{ $clients ? $clients : 0 }}</h5>
                            <span>Total Client </span>
                        </div>
                    </a>
                </div><!-- col -->
                <div class="col-md-3 mb-2">
                    <a href="{{ route('admin.worker.index') }}" class="shortcut-icon">
                        <div>
                            <i class="icon ion-ios-people"></i>
                            <h5>{{ $workers ? $workers : 0 }}</h5>
                            <span>Total Workers </span>
                        </div>
                    </a>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- col-8 -->
    </div><!-- row -->
@endsection

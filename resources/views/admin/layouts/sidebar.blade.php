<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="icon ion-ios-home-outline"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.client.index') }}" class="nav-link {{ Request::routeIs('admin.client.*') ? 'active' : '' }}">
        <i class="icon ion-ios-person-outline"></i>
        <span>Clients</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.worker.index') }}"
        class="nav-link {{ Request::routeIs('admin.worker.*') ? 'active' : '' }}">
        <i class="icon ion-ios-people-outline"></i>
        <span>Workers</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.survey.index') }}"
        class="nav-link {{ Request::routeIs('admin.survey.*') ? 'active' : '' }}">
        <i class="icon ion-ios-people-outline"></i>
        <span>Survey</span>
    </a>
</li>

<li class="nav-item">
    <a href="" class="nav-link with-sub @yield('qus_active')">
        <i class="icon ion-ios-help-outline"></i>
        <span>All Questions</span>
    </a>
    <ul class="nav-sub">
        <li class="nav-item">
            <a href="{{ route('question.index') }}"
                class="nav-link {{ Request::routeIs('question.index') ? 'active' : '' }} @yield('question_cr') @yield('question_view') @yield('question_edit')">Questions</a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('quiz_option.index') }}"
                class="nav-link {{ Request::routeIs('quiz_option.index') ? 'active' : '' }}  @yield('quiz_option_create') @yield('quiz_option_edit')">Quiz
                Options</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('quiz_ans.index') }}"
                class="nav-link {{ Request::routeIs('quiz_ans.index') ? 'active' : '' }}  @yield('quiz_create') @yield('quiz_edit')">Quiz
                Answer</a>
        </li> --}}
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('quiz.index') }}" class="nav-link {{ Request::routeIs('quiz.index') ? 'active' : '' }}">
        <i class="icon ion-ios-analytics-outline"></i>
        <span>Assesment</span>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.web.setting') }}" class="nav-link {{ Route::is('admin.web.setting') ? 'active' : '' }}">
        <i class="icon ion-ios-analytics-outline"></i>
        <span>Settings</span>
    </a>
</li>


	 <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="icon ion-ios-home-outline"></i>
        <span>Dashboard</span>
      </a>
    </li>
	 <li class="nav-item">
      <a href="{{route('admin.course.index')}}" class="nav-link {{ Request::routeIs('admin.course.*') ? 'active' : '' }}">
        <i class="icon ion-ios-home-outline"></i>
        <span>Courses</span>
      </a>
    </li>
	 <li class="nav-item">
      <a href="{{route('admin.student.index')}}" class="nav-link {{ Request::routeIs('admin.student.*') ? 'active' : '' }}">
        <i class="icon ion-ios-home-outline"></i>
        <span>Students</span>
      </a>
    </li>

    <li class="nav-item">
        <a href="" class="nav-link with-sub @yield('qus_active')">
          <i class="icon ion-ios-bookmarks-outline"></i>
          <span>All Questions</span>
        </a>
        <ul class="nav-sub">
            <li class="nav-item">
                <a href="{{route('question.index')}}" class="nav-link {{ Request::routeIs('question.index') ? 'active' : '' }} @yield('question_cr') @yield('question_view') @yield('question_edit')">Questions</a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{route('quiz_option.index')}}" class="nav-link {{ Request::routeIs('quiz_option.index') ? 'active' : '' }}  @yield('quiz_option_create') @yield('quiz_option_edit')">Quiz Options</a>
            </li>
            <li class="nav-item">
                <a href="{{route('quiz_ans.index')}}" class="nav-link {{ Request::routeIs('quiz_ans.index') ? 'active' : '' }}  @yield('quiz_create') @yield('quiz_edit')">Quiz Answer</a>
            </li> -->
        </ul>
    </li>

    <li class="nav-item">
      <a href="{{route('quiz.index')}}" class="nav-link {{ Request::routeIs('quiz.index') ? 'active' : '' }}">
        <i class="icon ion-ios-contact-outline"></i>
        <span>Quiz</span>
      </a>
    </li>

<div class="sidebar">
    <ul class="widget widget-menu unstyled">
        <li class="active"><a href="{{ url('/') }}"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
        <li><a href="{{ route('quiz.create') }}"><i class="menu-icon icon-bullhorn"></i>Create Quiz </a>
        </li>
        <li><a href="{{ route('quiz.index') }}"><i class="menu-icon icon-inbox"></i>List Quiz</a></li>
    </ul>
    <!--/.widget-nav-->

    <ul class="widget widget-menu unstyled">
        <li><a href="{{ route('question.create') }}"><i class="menu-icon icon-bullhorn"></i>Create Question </a>
        </li>
        <li><a href="{{ route('question.index') }}"><i class="menu-icon icon-inbox"></i>List Question</a></li>
    </ul>

    <ul class="widget widget-menu unstyled">
        <li><a href="{{ route('user.create') }}"><i class="menu-icon icon-bullhorn"></i>Create User </a>
        </li>
        <li><a href="{{ route('user.index') }}"><i class="menu-icon icon-inbox"></i>List User</a></li>
    </ul>

    <ul class="widget widget-menu unstyled">
        <li><a href="{{ route('exam.create') }}"><i class="menu-icon icon-bullhorn"></i>Create Exam to User</a>
        </li>
        <li><a href="{{ route('exam.index') }}"><i class="menu-icon icon-inbox"></i>List Exam of User</a></li>
    </ul>

    <ul class="widget widget-menu unstyled">
        <li><a href="{{ route('result') }}"><i class="menu-icon icon-bullhorn"></i>View Result</a>
        </li>
    </ul>

    <!--/.widget-nav-->
    <ul class="widget widget-menu unstyled">
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                <i class="menu-icon icon-signout"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
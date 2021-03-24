<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout.head')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="{{ route('question.one') }}">Question One</a>
                <a href="{{ route('question.two') }}">Question Two</a>
                <a href="{{ route('question.three') }}">Question Three</a>
                <a href="{{ route('question.four') }}">Question Four</a>
                <a href="{{ route('question.five') }}">Question Five</a>
            </div>

            <div class="content">

                @yield('content')
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>
    </body>
</html>

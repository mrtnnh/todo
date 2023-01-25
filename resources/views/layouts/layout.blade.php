<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
  <title>ToDo App</title>

</head>
<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="{{ route('home') }}">ToDo App</a>
      <div class="my-navbar-control">
        @if(Auth::check())
          <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>

          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            ログアウト
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @else
          <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>

          <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
        @endif
      </div>
    </nav>
  </header>
<main>
  @yield('content')
</main>
@yield('scripts')
</body>
</html>

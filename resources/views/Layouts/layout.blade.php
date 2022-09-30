<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title-page')
    </title>

    {{-- Link lib --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css" integrity="sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('link-lib')

    {{-- Link style --}}
    <link rel="stylesheet" href="/css/app.css">
    @yield('link-style')

</head>
<body>
    <header>
        <h3 style="text-transform: uppercase">human resource management</h3>
    </header>

    <main>
        <div class="left-side col-4">
            <ul type="none">
                <li><a href="{{ route('staff-management.index') }}">Show List</a></li>
                <li><a href="{{ route('staff-management.create') }}">Add a Staff</a></li>
                <li><a href="{{ route('staff-management.reset') }}">Reset Table</a></li>
            </ul>
        </div>

        <div class="right-side col-11">
            <form class="search-staff" action="{{ route('staff-management.search') }}">
                <input type="text" name="pattern" placeholder="Search . . ." autocomplete="off">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <hr>
            <div class="content">
                @yield('right-side-content')
            </div>
        </div>
    </main>

    <footer>
        <p>&copy<span> Bản quyền của DVC 2022</span></p>
    </footer>

    {{-- Link script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/app.js"></script>
    @yield('link-script')
</body>
</html>
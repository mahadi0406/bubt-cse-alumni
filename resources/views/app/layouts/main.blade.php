<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.partials.head')
</head>
<body>
    <div class="wrapper">
        @include('app.partials.nav')
        <div class="main">
            @include('app.partials.top')
            @include('app.components.flash-message')
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('contents')
                </div>
            </main>
            @include('app.partials.footer')
        </div>
    </div>
    @include('app.partials.scripts')
</body>
</html>

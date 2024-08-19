
<!DOCTYPE html>
<html>
    <head>
        @include('layout.header')
        @include('layout.navBar')
        @livewireStyles
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
    @include('layout.footer')
    </body>
</html>


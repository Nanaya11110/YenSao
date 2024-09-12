
<!DOCTYPE html>
<html>
    <head>
        @include('layout.header')
        @livewire('nav-bar')
        @livewireStyles
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
    @include('layout.footer')
    </body>
</html>


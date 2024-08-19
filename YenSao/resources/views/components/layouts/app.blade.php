<head>
    @include('layout.header')
    @include('layout.navBar')
    @livewireStyles
</head>
<body class="bg-gray-800">
    {{ $slot }}
 
    @livewireScripts
</body>

@include('layout.footer')
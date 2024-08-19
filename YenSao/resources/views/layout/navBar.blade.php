<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!--LOGO-->
        <a href="{{route('Home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('Mizu_blue.png')}}" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">NNS</span>
        </a>
        <!--USER SIDE-->
        @if (Auth::check())
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a class="mx-5" href="{{route('Cart')}}"><i class="fa-solid fa-cart-shopping" style="color: rgb(31, 76, 173)"></i></a>
                <a class="" href="{{ route('Logout') }}"><img class="w-10 h-10 object-cover rounded-full" src="{{asset('Mizu_blue.png')}}"
                        alt="user photo"></a>
               
            </div>
            
        @else
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a class=" text-white font-bold" href="{{ route('Login') }}"> Log in</a>
            </div>
        @endif

        <!--MENU SIDE-->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('Home') }}"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent  md:p-0 "
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{route('AboutUs')}}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        About</a>
                </li>
                <li>
                    <a href="{{route('AllProduct')}}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Product</a>
                </li>

                <li>

                    <a href="{{route('Contact')}}"

                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

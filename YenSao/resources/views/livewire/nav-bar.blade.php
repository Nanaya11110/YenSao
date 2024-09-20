
<nav class="bg-white border-gray-200 ">
    @auth
    <div class="hidden">
        {{
            $CartItem = App\Models\Cart::where('user_id',auth()->user()->id)->get()
        }}
        {{$Quantity = 0}}
        @foreach ($CartItem as $Item )
            {{$Quantity += $Item->quantity}} 
        @endforeach
        </div>
    @endauth
 
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!--LOGO-->
        <a href="{{ route('Home') }}" class="flex items-center space-x-3 rtl:space-x-reverse ">
            <img src="{{asset('HomePage/DT-Logo.png')}}" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-green-500">DTVietNam</span>
        </a>
        <!--USER SIDE-->
        @if (Auth::check())
            <div class="flex  items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a class=" font-bold text-green-600" href="{{route('Logout')}}">Log Out</a>

                <a class="px-3" href="{{ route('Cart') }}"><i class="fa-solid fa-cart-shopping"
                        style="color: rgb(0, 100, 0)"></i><span class=" font-bold text-green-800">({{$Quantity}})</span></a>
                <a class="" href="{{route('Profile',['id'=>auth()->user()->id])}}"><img class="w-10 h-10 object-cover rounded-full"
                        src="{{asset(auth()->user()->avatar_url)}}" alt="user photo"></a>
            </div>
        @else
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a class=" text-green-500 font-bold" href="{{ route('Login') }}"> Log in</a>
            </div>
        @endif

        <!--MENU SIDE-->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user" >
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 text-green-500 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('Home') }}"
                        class="block py-2 px-3  rounded  md:p-0 hover:text-green-700 transition-all duration-300"
                        aria-current="page">Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('AboutUs') }}"
                        class="block py-2 px-3  rounded  md:p-0 hover:text-green-700 transition-all duration-300">Giới thiệu</a>
                </li>
                <li>
                    <a href="{{ route('AllProduct') }}"
                        class="block py-2 px-3  rounded  md:p-0 hover:text-green-700 transition-all duration-300">Sản phẩm</a>
                </li>
                <li>
                    <a href="{{ route('Contact') }}"
                        class="block py-2 px-3  rounded  md:p-0 hover:text-green-700 transition-all duration-300">Liên hệ</a>
                </li>
                @auth
                @if (auth()->user()->role == 'admin')
                <li>
                    <a href="{{ route('AdminHomePage') }}"
                        class=" object-center  w-20 h-10  text-green-900 rounded transition-all hover:text-green-700  duration-300  "
                        aria-current="page">Admin</a>
                </li>    
                @endif
                @endauth
                
            </ul>
        </div>
    </div>
</nav>

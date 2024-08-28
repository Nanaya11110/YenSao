 <aside class = " w-14 float-start transition transform ease-in-out duration-1000 z-50 flex bg-[#1E293B] ">
     
        <!-- MINI SIDEBAR-->
        <div class= "mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
            <div class= "hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-green-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                <a href="{{ route('AdminHomePage') }}"> 
                    <i class="fa-solid fa-house"></i>
                </a>
            </div>
            <div class= "hover:ml-4 justify-end pr-5 text-white hover:text-red-500 dark:hover:text-red-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                <a href="{{route('AllUserAdminPage')}}">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
            <div class= "hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-purple-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                <a>
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
    </aside>
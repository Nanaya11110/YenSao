 <aside class = " h-full w-14 float-start transition transform ease-in-out duration-1000 z-50 flex bg-[#1E293B] ">
        <!-- MINI SIDEBAR-->
        <div class= "mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
            <div class= " hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-green-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                <a href="{{ route('AdminHomePage') }}"> 
                    <i class="fa-solid fa-house"></i>
                </a>
            </div>
            
            <div class= "hover:ml-4 justify-end pr-5 text-white hover:text-red-500 dark:hover:text-red-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                <a href="{{route('AllUserAdminPage')}}">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
            <div class= "hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-yellow-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                <a href="{{ route('AllProductAdminPages') }}"> 
                    <i class="fa-solid fa-box"></i>
                </a>
            </div>
            <div class= "hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-purple-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                <a href="{{route('Chart')}}">
                    <i class="fa-solid fa-calendar-days"></i>
                </a>
            </div>
        </div>
    </aside>
<div class = "body bg-white dark:bg-[#0F172A]">
    <style>
        th,
        tr,
        td {
            padding: 5px
        }

        tr {
            margin: 5px
        }
    </style>
    @include('layout.AdminSideBar')
    <!-- CONTENT -->
    <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        <div class = "flex flex-wrap my-5 -mx-2">
            <!--TOTAL USER-->
            <div class = "w-full lg:w-1/3 p-2">
                <div class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-blue-500 dark:to-green-500 from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                    <div
                        class = "flex text-indigo-500 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <i class="fa-solid fa-user-group text-2xl"></i>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            Tổng người dùng
                        </div>
                        <div class = "">
                            {{ $TotalUserCount }}
                        </div>
                    </div>
                </div>
            </div>
            <!--TOTAL PRODUCT-->
            <div class = "w-full md:w-1/2 lg:w-1/3 p-2 ">
                <div  class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-red-500 dark:to-orange-500 from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                    <div class = "flex text-indigo-500 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <i class="fa-solid fa-boxes-stacked text-2xl"></i>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            Tổng sản phẩm
                        </div>
                        <div class = "">
                            {{ $TotalProductCount }}
                        </div>
                    </div>
                </div>
            </div>
            <!--TOTAL POST-->
            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-purple-900 dark:to-pink-500 from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                    <div
                        class = "flex text-indigo-500 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <i class="fa-solid fa-newspaper text-2xl"></i>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            Total post
                        </div>
                        <div class = "">
                            {{$TotalPostCount}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ALL PRODUCT TABLE-->
        <div class=" w-full">
            <div class="my-4">
                <input 
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <table class=" w-full bg-green-300 ">
                <tr class=" ">
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th class=" w-3/5">Thông tin</th>
                    <th>Sửa/Xóa</th>
                </tr>
                @foreach ($TotalProduct as $Product)
                    <tr>
                        <td>{{ $Product->id }}</td>
                        <td class=" font-bold">{{ $Product->name }}</td>
                        <td><img class=" w-20 h-20" src="{{ $Product->image }}"></td>
                        <td class=" pr-2">{{ $Product->price }}$</td>
                        <td>{{ \Illuminate\Support\Str::limit($Product->description, 150) }}</td>
                        <td class=" w-40 ">
                            <div class="flex justify-between items-center text-white  font-bold h-full">
                                <button wire:click='DeleteProduct({{ $Product }})'
                                    class="bg-red-500 w-20 h-12 rounded-xl hover:bg-red-800 transition-all duration-300">Delete</button>
                                <button wire:click='UpdateProduct({{ $Product }})'
                                    class="bg-yellow-500 ml-2 w-20 h-12 rounded-xl hover:bg-yellow-800 transition-all duration-300">Update</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <button wire:click='AddProduct'
                class=" w-32 h-10 font-bold text-white bg-green-500 my-5 hover:bg-green-800 transition-all duration-300">Thêm
                sản phẩm</button>
        </div>
 </div>
</div>

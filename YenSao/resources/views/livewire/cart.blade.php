<div class="container mx-auto mt-10">
    <div class="sm:flex shadow-md my-10">
        <div class="  w-full  sm:w-3/4  px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Giỏ hàng</h1>
                <h2 class="font-semibold text-2xl">{{count($CartItem)}} món</h2>
            </div>
            @foreach ($CartItem as $Item)
            <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                <div class="md:w-4/12 2xl:w-1/4 w-full">
                    <img src="{{$Item->product->image}}" alt="Black Leather Purse"
                        class="h-full object-center object-cover md:block hidden" />
                </div>
                <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base font-black leading-none text-gray-800">{{$Item->product->name}}</p>
                        <input type="text" class="w-10 bg-gray-300 text-center" value="{{$Item->quantity}}" aria-label="Select quantity"> </input>
                    </div>
                    <p class="w-96 text-xs leading-3 text-gray-600">{{$Item->product->weight}} ml</p>
                    <div class="flex items-center justify-between pt-5">
                        <div class="flex itemms-center">
                            <button wire:click='AddToCart({{$Item}})' class="text-xs leading-3 underline text-green-500 pl-5 cursor-pointer">Thêm</button>
                            @if ($Item->quantity > 1)
                            <button wire:click='DecItem({{$Item}})' class="text-xs leading-3 underline text-yellow-500 pl-5 cursor-pointer">Trừ</button>
                                
                            @endif
                            <button wire:click='RemoveFromCart({{$Item}})' class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Xóa</button>
                        </div>
                        <p class="text-base font-black leading-none text-gray-800">{{$Item->product->price}}$</p>
                    </div>
                </div>
            </div>
            {{$TotalPrice += $Item->quantity * $Item->product->price}}
            @endforeach
            

          
            <!--CONTINUTE SHOPPING-->
            <a href="{{route('Home')}}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Tiếp tục mua sắm
            </a>
        </div>
        <div id="summary" class=" w-full   sm:w-1/4   md:w-1/2     px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Tổng kết</h1>
            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Tổng</span>
                    <span>{{$TotalPrice}}$</span>
                </div>
                <button  wire:click='checkout'
                    class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                    Thanh toán
                </button>
            </div>
        </div>
    </div>
</div>

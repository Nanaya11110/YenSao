<div class="font-sans  ">
    <div class="p-4 lg:max-w-7xl max-w-2xl max-lg:mx-auto">
        <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">
            <div class="lg:col-span-3 w-full lg:sticky top-0 text-center">
                <div class="px-4 py-12 rounded-xl">
                    <img src="{{asset($product->image)}}" alt="Product" class="w-9/12 rounded object-cover mx-auto" />
                </div>
            </div>

            <div class="lg:col-span-2">
                <h2 class="text-3xl font-semibold text-black ">{{$product->name}}</h2>

                <div class="flex space-x-2 mt-4">
                    <svg class="w-[18px] fill-yellow-300" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-[18px] fill-yellow-300" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-[18px] fill-yellow-300" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-[18px] fill-yellow-300" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-[18px] fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <h4 class="text-white text-base">500 Reviews</h4>
                </div>

                <div class="flex flex-wrap gap-4 mt-8">
                    <p class="text-black text-4xl font-semibold">{{$product->price}}$</p>
                    <p class="text-gray-500 text-base"><strike>{{$product->price/2}}</strike> </p>
                </div>

                <div class="flex flex-wrap gap-4 mt-8">
                    <button type="button" 
                    class="min-w-[200px] px-4 py-3 bg-yellow-300 hover:bg-yellow-400 text-black text-sm font-semibold rounded">Buy now</button>
                    <button type="button" class="min-w-[200px] px-4 py-2.5 border border-yellow-300 bg-transparent text-yellow-600 text-sm font-semibold rounded">Add to cart</button>
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-black">About the Item</h3>
                    <p class="space-y-3 list-disc mt-4 pl-4 text-sm text-black">
                        {{$product->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
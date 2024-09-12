@section('title', $product->name)
<div class="font-sans  ">
    <!--FLASH MESSAGE-->
    <div wire:ignore id="flash-message" class=" z-10 fixed top-4 left-4 bg-green-500 text-white p-4 
    rounded shadow-lg hidden">
        <p class="font-bold">Thêm sản phẩm thành công</p>
        <p>Sản phẩm đã có trong giỏ hàng</p>
    </div>
    <!--PRODUCT DETAILS-->
    <div class="p-4 lg:max-w-7xl max-w-2xl max-lg:mx-auto">
        <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">
            <div class="lg:col-span-3 w-full lg:sticky top-0 text-center">
                <div class="px-4 py-12 rounded-xl">
                    <img src="{{ asset($product->image) }}" alt="Product" class="w-9/12 rounded object-cover mx-auto" />
                </div>
            </div>
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold text-black ">{{ $product->name }}</h2>


                <div class="flex flex-wrap gap-4 mt-8">
                    <p class="text-black text-4xl font-semibold">{{ $product->price }}$</p>
                    <p class="text-gray-500 text-base"><strike>{{ $product->price / 2 }}</strike> </p>
                </div>

                <div class="flex flex-wrap gap-4 mt-8">
                    <button type="button" wire:click="CheckOut"
                        class="min-w-[200px] px-4 py-3 bg-green-300 hover:bg-green-400 text-black text-sm font-semibold rounded">Mua
                        ngay</button>
                    <button id="CartButton" wire:click="AddToCart" type="button"
                        class="min-w-[200px] pl-10 py-2.5 border border-green-300 bg-transparent text-green-600 text-sm font-semibold rounded">Thêm
                        vào giỏ hàng</button>
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-black">Về sản phẩm</h3>
                    <div class="space-y-3 list-disc mt-4 pl-4 text-sm text-black">
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartButton = document.getElementById('CartButton');
        // Add a click event listener to the button
        cartButton.addEventListener('click', function() {
            let flashMessage = document.getElementById('flash-message');
            let flashMessageText = document.getElementById('flash-message-text');
            // Show the flash message
            flashMessage.classList.remove('hidden');

            console.log("SHOW: " + flashMessage.classList);

            // Hide the flash message after 2 seconds
            setTimeout(() => {
                flashMessage.classList.add('hidden');
                console.log("HIDE: " + flashMessage.classList);
            }, 2000);
        });
        Livewire.on('flashMessage', (message) => {
           
        });
    });
</script>

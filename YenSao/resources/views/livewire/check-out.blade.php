
<div class="container mx-auto p4-10">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-xl">
        <div class="md:flex">
            <div class="w-full px-6 py-8 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800">Thanh toán</h2>
                <p class="mt-4 text-gray-600">Điền thông tin</p>
                <form  class="mt-6">
                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-2" for="name">
                            Tên
                        </label>
                        <input wire:model.live='name' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="{{auth()->user()->name}}">
                        @error('name')
                        <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-2" for="email">
                            Email
                        </label>
                        <input wire:model.live='email' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="{{auth()->user()->email}}">
                        @error('email')
                        <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-2" for="email">
                            SĐT
                        </label>
                        <input wire:model.live='phone' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="{{auth()->user()->email}}">
                        @error('phone')
                        <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-2" for="email">
                            Địa chỉ giao
                        </label>
                        <input wire:model.live='address' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="xx/x Street">
                        @error('address')
                        <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-2" for="cvv">
                            Phương thức thanh toán
                        </label>
                       <select wire:model='method' class="w-full h-10">asdaa
                            <option>Card</option>
                            <option>VISA</option>
                       </select>
                        @error('method')
                        <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-2" for="card_number">
                            Card Number
                        </label>
                        <input wire wire:model.live='CardNumber' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="card_number" type="text" placeholder="**** **** **** 1234">
                        @error('CardNumber')
                        <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-2" for="expiration_date">
                            Expiration Date
                        </label>
                        <input wire:model.live='ExpirationDate' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="expiration_date" type="text" placeholder="MM / YY">
                        @error('ExpirationDate')
                        <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button wire:click='shipp' class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
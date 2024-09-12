<div class="">
   @include('layout.AdminSideBar')
    <!--FORM-->
    <div>
        <div class="bg-gray-800">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                    <div class="col-span-4 sm:col-span-3">
                        <div class="bg-gray-700 shadow rounded-lg p-6">
                            <div class="flex flex-col items-center">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}"
                                        class="w-32 h-32 bg-cover bg-gray-300 rounded-full mb-4 object-cover shrink-0">
                                @else
                                    <img src="" id='preview_img'
                                        class="w-32 h-32 bg-gray-300 rounded-full object-cover mb-4 shrink-0">
                                @endif
    
                            </div>
                            <div class="flex items-center space-x-6 mb-5">
                                <label class="block">
                                    <span class="sr-only">Chọn hình ảnh</span>
                                    <input type="file" onchange="loadFile(event)" wire:model.live="image"
                                        class="block w-full text-sm text-slate-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-violet-700
                                      hover:file:bg-violet-100
                                    " />
                                </label>
                            </div>
                            <hr class="my-6 border-t border-gray-300">
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-9">
                        <div class="bg-gray-700 shadow rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-4 text-white">Thêm sản phẩm</h2>
    
                            <p class="text-gray-700"></p>
    
                            <!--NAME = GMAIl-->
                            <div class="mb-6">
                                <label for="gmail" class="block text-white mb-2 text-sm font-medium">Tên Sản phẩm</label>
                                <input type="text" id="gmail" name="gmail" wire:model.live="gmail"
                                    class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5">
                            </div>
                            @error('gmail')
                                <div class="bg-red-500 text-black">{{ $message }}</div>
                            @enderror
    
                            <!--PRICE = NAME-->
                            <div class="mb-6">
                                <label for="gmail" class="block text-white mb-2 text-sm font-medium">Giá sản phẩm</label>
                                <input type="text" id="name" name="name" wire:model.live="name"
                                    value="{{ auth()->user()->name }}"
                                    class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5">
                            </div>
                            @error('name')
                                <div class="bg-red-500 text-black">{{ $message }}</div>
                            @enderror
    
                            <!--PASSWORD-->
                            <div class="mb-6">
                                <label for="password" class="block text-white mb-2 text-sm font-medium">Mô tả</label>
                                <textarea id="password" name="password" wire:model.live="password"
                                    class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5"></textarea>
                            </div>
                            @error('password')
                                <div class="bg-red-500 text-black">{{ $message }}</div>
                            @enderror
                            <!--AVATAR UPLOAD-->
                            <button type="button" wire:click ="Add"
                                class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4
                                 focus:ring-gray-600 font-medium rounded-lg 
                                 text-sm px-5 py-2.5 me-2 mb-2 my-5
                                  focus:outline-none">Add</button>
                           
    
                        </div>
                        <span class=" font-semibold" wire:loading>Loading...</span>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

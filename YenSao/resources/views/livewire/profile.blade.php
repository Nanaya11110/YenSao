<div>
    <div class="bg-gray-100">

        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}"
                                    class="w-32 h-32 bg-cover bg-gray-300 rounded-full mb-4 object-cover shrink-0">
                            @else
                                <img src="{{ asset(auth()->user()->avatar_url) }}" id='preview_img'
                                    class="w-32 h-32 bg-gray-300 rounded-full object-cover mb-4 shrink-0">
                            @endif

                        </div>
                        <div class="flex items-center space-x-6 mb-5">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
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
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Tài khoản của tôi</h2>

                        <p class="text-gray-700"></p>

                        <!--GMAIL-->
                        <div class="mb-6">
                            <label for="gmail" class="block mb-2 text-sm font-medium">Gmail</label>
                            <input type="text" id="gmail" name="gmail" wire:model.live="gmail" value="{{$gmail}}"
                                class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5">
                        </div>
                        @error('gmail')
                            <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror

                        <!--NAME-->
                        <div class="mb-6">
                            <label for="gmail" class="block mb-2 text-sm font-medium">Tên của bạn</label>
                            <input type="text" id="name" name="name" wire:model.live="name" value="{{$name}}"
                                value="{{ auth()->user()->name }}"
                                class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5">
                        </div>
                        @error('name')
                            <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror

                        <!--PASSWORD-->
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium">Mật khẩu</label>
                            <input type="password" id="password" name="password" wire:model.live="password"
                                class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5"
                                placeholder="Your Password">
                        </div>
                        @error('password')
                            <div class="bg-red-500 text-black">{{ $message }}</div>
                        @enderror
                        <!--AVATAR UPLOAD-->
                        <button type="button" wire:click ="update"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                             focus:ring-blue-300 font-medium rounded-lg 
                             text-sm px-5 py-2.5 me-2 mb-2 my-5
                              dark:bg-blue-600 dark:hover:bg-blue-700 
                              focus:outline-none dark:focus:ring-blue-800">Update</button>
                        <button type="button" wire:click ="delete"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4
                               focus:ring-red-300 font-medium rounded-lg 
                               text-sm px-5 py-2.5 me-2 mb-2 my-5
                                dark:bg-red-600 dark:hover:bg-red-700 
                                focus:outline-none dark:focus:ring-red-800">Delete</button>

                    </div>
                    <span class=" font-semibold" wire:loading>Loading...</span>

                </div>
            </div>
        </div>
    </div>
</div>

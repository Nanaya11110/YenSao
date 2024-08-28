<div class="">
    @include('layout.AdminSideBar')
     <!--FORM-->
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
                         <div class="bg-white shadow rounded-lg p-6">
                             <h2 class="text-xl font-bold mb-4">Thêm người dùng</h2>
     
                             <p class="text-gray-700"></p>
     
                             <!--NAME-->
                             <div class="mb-6">
                                 <label for="gmail" class="block mb-2 text-sm font-medium">Tên người dùng</label>
                                 <input type="text" id="gmail" name="gmail" wire:model.live="gmail"
                                     class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5">
                             </div>
                             @error('gmail')
                                 <div class="bg-red-500 text-black">{{ $message }}</div>
                             @enderror
                             <select wire:model.live ='role' class=" my-5 block w-32 h-10 px-5 bg-gray-200 border border-gray-900 rounded-lg shadow-sm  sm:text-sm">
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                             <!--EMAIL-->
                             <div class="mb-6">
                                 <label for="gmail" class="block mb-2 text-sm font-medium">Email</label>
                                 <input type="text" id="name" name="name" wire:model.live="name"
                                     value="{{ auth()->user()->name }}"
                                     class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5">
                             </div>
                             @error('name')
                                 <div class="bg-red-500 text-black">{{ $message }}</div>
                             @enderror
     
                             <!--PASSWORD-->
                             <div class="mb-6">
                                 <label for="password" class="block mb-2 text-sm font-medium">Mật khẩu</label>
                                 <input id="password" type="password" name="password" wire:model.live="password"
                                     class="bg-green-50 border  text-sm rounded-lg  block w-full p-2.5">
                             </div>
                             @error('password')
                                 <div class="bg-red-500 text-black">{{ $message }}</div>
                             @enderror
                             <!--ADD BUTTON-->
                             <button type="button" wire:click ="Add"
                                 class=" bg-green-500 text-white font-medium rounded-lg 
                                  text-sm px-5 py-2.5 me-2 mb-2 my-5">Add</button>
                            
     
                         </div>
                         <span class=" font-semibold" wire:loading>Loading...</span>
     
                     </div>
                 </div>
             </div>
         </div>
     </div>
     
 </div>
 
<div class="flex bg-gray-800">
    @include('layout.AdminSideBar')
    
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
                <th>Id</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Role</th>
                <th>Sửa/Xóa</th>
            </tr>
            @foreach ($AllUser as $User)
                <tr class="text-center">
                    <td >{{ $User->id }}</td>
                    <td class=" font-bold">{{ $User->name }}</td>
                    <td> {{$User->email}}</td>
                    <td>{{ $User->note }}</td>
                    <td>{{ $User->role }}</td>
                    <td class=" w-40 ">
                        <div class="flex justify-between items-center text-white  font-bold h-full">
                            <button wire:click='DeleteUser({{ $User }})'
                                class="bg-red-500 w-20 h-12 rounded-xl hover:bg-red-800 transition-all duration-300">Delete</button>
                            <button wire:click='UpdateUser({{ $User }})'
                                class="bg-yellow-500 ml-2 w-20 h-12 rounded-xl hover:bg-yellow-800 transition-all duration-300">Update</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <button wire:click='AddUser'
            class=" w-52 ml-5 h-10 font-bold text-white bg-green-500 my-5 hover:bg-green-800 transition-all duration-300">Thêm
           người dùng</button>
    </div>
</div>

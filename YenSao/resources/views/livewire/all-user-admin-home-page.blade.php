@section('title','All User')

<div class="flex bg-gray-800">
    @include('layout.AdminSideBar')
    
    <div class=" w-full mx-5">
        <div class="my-4">
            <input 
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search..."
                class="w-full px-4 py-2 border bg-gray-700 text-white border-gray-800 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <table class=" w-full bg-gray-700 rounded-lg text-white ">
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
                    
                    <td class=" font-bold @if ($User->role == 'User' || $User->role == 'user') text-green-700
                        @else text-red-500 @endif">{{ $User->role }}</td>
                    <td class=" w-40 ">
                        <div class=" text-white  font-bold h-full">
                            <button wire:click='UpdateUser({{ $User }})'> <i class="fa-solid fa-pencil mr-2"></i></button>
                            <button wire:click='DeleteUser({{ $User }})'> <i class="fa-solid fa-trash text-red-500"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class=" w-64 float-end m-2"> {{ $AllUser->links() }}  </div>
        <button wire:click='AddUser'
            class=" w-52 ml-5 h-10 font-bold text-white bg-green-500 my-5 hover:bg-green-800 transition-all duration-300">Thêm
           người dùng</button>
    </div>
</div>

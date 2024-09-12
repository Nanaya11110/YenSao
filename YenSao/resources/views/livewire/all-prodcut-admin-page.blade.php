@section('title','All Product')

<div class="flex gap-3 bg-gray-900">
    <style>
        th,tr, td {padding: 15px; }
        tr { margin: 5px}
    </style>
      @include('layout.AdminSideBar')
      <!--ALL PRODUCT TABLE-->
      <div class=" w-full">
        <div class="my-4">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search..."
                class="w-full text-white px-4 py-2 border bg-gray-800 border-gray-900 rounded-lg shadow-sm focus:outline-none transition-all duration-200 hover:bg-gray-700 " />
        </div>
        <table class=" bg-gray-800 rounded-md w-full text-white">
            <tr class=" ">
                <th>Id</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th class=" w-32">Giá</th>
                <th>Thông tin</th>
                <th>Sửa/Xóa</th>
            </tr>
            @foreach ($TotalProduct as $Product)
                <tr class=" border-b-2 border-gray-500">
                    <td>{{ $Product->id }}</td>
                    <td class=" font-bold">{{ $Product->name }}</td>
                    <td><img class=" w-28 h-20" src="{{ $Product->image }}"></td>
                    <td class="text-center">{{ $Product->price }} VND</td>
                    <td>{{ \Illuminate\Support\Str::limit($Product->description, 150) }}</td>
                    <td class=" w-36">
                        <div class=" ml-10   font-bold h-full">
                            <button wire:click='UpdateProduct({{ $Product }})'><i class="fa-solid fa-pencil  mr-2"></i></button>
                            <button wire:click='DeleteProduct({{ $Product }})'><i class="fa-solid fa-trash text-red-500  mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
       <div class=" w-64 float-end m-2"> {{ $TotalProduct->links() }}  </div>
        <button wire:click='AddProduct'
            class=" w-32 h-10 font-bold text-white bg-green-500 my-5 hover:bg-green-800 transition-all duration-300">Thêm
            sản phẩm</button>
    </div>
</div>

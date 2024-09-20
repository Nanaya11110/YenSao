@section('title','Tất cả sản phẩm')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-10 md:px-20">
    @foreach ($products as $product )
    <a href="{{route('ProductDetail',['id'=>$product->id])}}" class="hover:-translate-y-6 t transition-all duration-200
         rounded-xl overflow-hidden">
        <div class=" w-96 h-96 bg-red-500">
            <img class=" w-full h-full" src="{{$product->image}}">
        </div>
        <div class="p-4 shadow-2xl">
            <div class="text-xl font-bold text-gray-800 mb-2">{{$product->name}}</div>
            <p>{{$product->price}} VND</p>
            <p class="text-gray-500 text-sm">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
        </div>
    </a>
    @endforeach

    


</div>
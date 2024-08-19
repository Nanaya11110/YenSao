<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-10 md:px-20">
    @foreach ($products as $product )
    <a href="{{route('ProductDetail',['id'=>$product->id])}}" class=" rounded-xl shadow-md overflow-hidden">
        <div class=" ">
            <img class="w-full h-96 object-cover" src="{{$product->image}}">
        </div>
        <div class="p-4">
            <div class="text-lg font-medium text-gray-800 mb-2">{{$product->name}}</div>
            <p class="text-gray-500 text-sm">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
        </div>
    </a>
    @endforeach

    


</div>
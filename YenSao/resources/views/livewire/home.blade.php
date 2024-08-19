<div class="py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Featured products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($products as $product )
            <a href="{{route('ProductDetail',['id'=>$product->id])}}" class=" rounded-lg bg-slate-300 hover:-translate-y-2 duration-500 shadow-md overflow-hidden">
                <img src="{{$product->image}}" alt="Coffee"
                    class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{$product->name}}</h3>
                    <p class="text-gray-700 text-base">{{$product->description}}.</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-gray-700 font-medium">{{$product->price}}$</span>
                        <button
                            class="px-4 py-2 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-200">Add
                            to cart</button>
                    </div>
                </div>
            </a>
            @endforeach
            
        </div>
    </div>
    <div class="container mx-auto px-4 mt-5 ">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Find by Category</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
           
            @foreach ($products as $product )
            <div class="bg-slate-300 hover:-translate-y-2 duration-500 rounded-lg shadow-md overflow-hidden">
                <img src="{{$product->image}}" alt="Coffee"
                    class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{$product->name}}</h3>
                    <p class="text-gray-700 text-base">{{$product->description}}.</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-gray-700 font-medium">{{$product->price}}$</span>
                        <button
                            class="px-4 py-2 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-200">Add
                            to cart</button>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
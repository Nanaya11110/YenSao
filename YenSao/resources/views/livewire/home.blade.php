<div>
<!--PRODUCT-->
<div class="py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-green-900 mb-8">Sản phẩm nổi bật</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($products as $product )
            <a href="{{route('ProductDetail',['id'=>$product->id])}}" class=" rounded-lg bg-slate-300 hover:-translate-y-2 duration-500 shadow-md overflow-hidden">
                <img src="{{$product->image}}" alt="{{$product->name}}"
                    class="w-full h-96 object-fill">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{$product->name}}</h3>
                    <p class="text-gray-700 text-base">Khối lượng: {{$product->weight}}ml</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-gray-700 font-medium">{{$product->price}}$</span>
                     </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
  
</div>

<!-- POST -->
<section class="bg-gray-100 py-8 mt-10 ">
    <div class=" w-32 my-2 h-10 text-white font-bold text-xl text-center mx-auto pt-1 bg-green-500">Tin tức</div>
    <div class="container mx-auto text-center px-4">
        <div class="flex flex-wrap -mx-4">
            @foreach ($post as $post )
            <a href="{{route('PostDetail',['id'=>$post->id])}}" class="w-full md:w-1/4 px-4 mb-8 ">
                <div class="bg-white p-8 shadow-md rounded-md">
                    <img src="{{$post->url}}">
                    <h3 class="text-xl font-bold text-green-500 mb-2">{{$post->title}}</h3>
                    <p class="text-gray-600 text-left">{{ \Illuminate\Support\Str::limit($post->content, 100) }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
</div>

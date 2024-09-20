@section('title', $product->name)
<div class="font-sans">
    <!--PRODUCT DETAILS-->
    <div class="p-4 lg:max-w-7xl max-w-2xl max-lg:mx-auto ">
        <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">
            <div class="lg:col-span-3 w-full top-0 text-center">
                <div class="px-4 py-12 rounded-xl ">
                    <img src="{{ asset($product->image) }}" alt="Product" class="w-9/12 rounded object-cover mx-auto" />
                </div>
            </div>
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold text-black">{{ $product->name }}</h2>

                <div class="flex flex-wrap gap-4 mt-8">
                    <p class="text-black text-4xl font-semibold">{{ $product->price }}$</p>
                    <p class="text-gray-500 text-base"><strike>{{ $product->price / 2 }}</strike> </p>
                    @if (!empty($rating))
                        <p class="ml-5">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < floor($rating))
                                    <i class="fa-solid fa-star text-2xl mt-2 text-yellow-500 fa-beat"></i>
                                    <!-- FULL STAR -->
                                @elseif ($i == floor($rating) && $rating - floor($rating) >= 0.5)
                                    <i class="fa-solid fa-star-half-stroke text-2xl text-yellow-500 fa-beat"></i>
                                @else
                                    <i class="fa-regular fa-star text-2xl mt-2 fa-beat text-yellow-500"></i>
                                    <!-- EMPTY STAR -->
                                @endif
                            @endfor
                        </p>
                    @endif
                </div>

                <div class="flex flex-wrap gap-4 mt-8">
                    <button type="button"
                        class="min-w-[200px] px-4 py-3 bg-green-300 hover:bg-green-400 text-black text-sm font-semibold rounded">Mua
                        ngay</button>
                    <button id="CartButton" wire:click="AddToCart" type="button"
                        class="min-w-[200px] text-center py-2.5 border border-green-300 bg-transparent text-green-600 text-sm font-semibold rounded">Thêm
                        vào giỏ hàng</button>
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-black">Về sản phẩm</h3>
                    <div class="space-y-3 list-disc mt-4 pl-4 text-sm text-black">
                        {{ $product->description }}
                    </div>
                    <div class="space-y-3 list-disc mt-4 pl-4 text-sm text-black">
                        <div class="space-y-2">
                            <p class="text-md font-semibold text-blue-800">Khối lượng: <span
                                    class="text-black">{{ $product->weight }}ml</span></p>
                            <p class="text-md font-semibold text-blue-800">Xuất sứ: <span
                                    class="text-black">{{ $product->origin }}</span></p>
                            <p class="text-md font-semibold text-blue-800">Quy cách: <span
                                    class="text-black">{{ $product->packaging }}</span></p>
                            <p class="text-md font-semibold text-blue-800">Hạn sử dụng: <span
                                    class="text-black">{{ \Carbon\Carbon::parse($product->expirationdate)->diffForHumans() }}
                                </span></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--COMMENT SECTION-->
    <div class="w-full rounded-lg border p-1 md:p-3 my-10 ">
        <h3 class="font-semibold p-1">Nhận xét</h3>
        <div class="flex flex-col gap-5 m-3">
            @foreach ($comments as $comment)
                @if ($comment->parent_id == null)
                    <!-- COMMENT -->
                    <div class="flex shadow-lg  shadow-slate-400 w-full justify-between border rounded-md">
                        <div class="p-3">
                            <div class="flex gap-3 items-center">
                                <img src="{{ asset($comment->user->avatar_url) }}"
                                    class="object-cover w-10 h-10 border-green-500 rounded-full border-2">
                                <h3 class="font-bold">
                                    {{ $comment->user->name }}
                                    <br>
                                    <span class="text-sm text-gray-400 font-normal">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i >= $comment->star)
                                                <i class="fa-regular fa-star text-black"></i>
                                            @else
                                                <i class="fa-solid fa-star text-yellow-500"></i>
                                            @endif
                                        @endfor
                                    </span>

                                    <p class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                                </h3>
                            </div>


                            @if ($IsEditable == $comment->id)
                                <input wire:model='UpdateCommentContent' type="text" required
                                    class="block p-2 w-60 h-9 border-black border rounded-lg">
                                <button wire:click='UpdateComment'
                                    class="hover:text-red-800 duration-200 text-red-500 ml-2">Xác nhận</button>
                                @error('UpdateCommentContent')
                                    <p class="bg-red-500">{{ $message }}</p>
                                @enderror
                            @else
                                <p class="text-gray-600 mt-2"> {{ $comment->text }} </p>
                                <button wire:click='SetReplyComment({{ $comment->id }})' wire:loading.attr="disabled"
                                    class="text-right text-blue-500 hover:text-blue-800 duration-200">Phản hồi</button>
                                @auth
                                    @if ($comment->user_id == auth()->user()->id)
                                        <button id="EditButton" wire:click='EditComment({{ $comment->id }})'
                                            wire:loading.attr="disabled"
                                            class="hover:text-yellow-800 duration-200 text-yellow-500 ml-2">Chỉnh
                                            sửa</button>
                                        <button wire:click='DeleteComment({{ $comment->id }})'
                                            wire:loading.attr="disabled"
                                            class="hover:text-red-800 duration-200 text-red-500 ml-2">Xóa</button>
                                    @endif

                                @endauth
                            @endif
                        </div>
                    </div>
                    <!--REPLY FORM-->

                    @if ($IsReplying && $ReplyCommentId == $comment->id)
                        <form wire:submit='AddReply' class="w-11/12 mx-auto">
                            <div class="w-full px-3 mb-2 mt-6">
                                <textarea wire:model='ReplyCommentContent'
                                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white"
                                    name="body" placeholder="Comment" required></textarea>
                            </div>
                            <div class="w-full flex justify-end px-3 my-3">
                                <input type="submit"
                                    class="px-2.5 py-1.5 hover:cursor-pointer hover:bg-green-700 transition-colors duration-300 rounded-md text-white text-lg bg-green-500"
                                    value='Bình luận'>
                            </div>
                        </form>
                    @endif
                    <!-- REPLY COMMENT -->
                    @foreach ($comments as $reply)
                        @if ($comment->id == $reply->parent_id)
                            <div class="flex shadow-lg  shadow-slate-400 justify-between border ml-5 rounded-md ">
                                <div class="p-3">
                                    <div class="flex gap-3">
                                        <img src="{{ asset($reply->user->avatar_url) }}"
                                            class="object-cover w-10 h-10 rounded-full border-2 border-emerald-400 shadow-emerald-400">
                                        <h3 class="font-bold">{{ $reply->user->name }}<br>
                                            <span
                                                class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                                        </h3>
                                    </div>

                                    @auth

                                        @if ($IsEditable == $reply->id)
                                            <input wire:model='UpdateCommentContent' type="text" required
                                                class="block p-2 w-60 h-9 border-black border rounded-lg">
                                            <button wire:click='UpdateComment' wire:loading.attr="disabled"
                                                class="hover:text-red-800 duration-200 text-red-500 ml-2">Xác nhận</button>
                                            @error('UpdateCommentContent')
                                                <p class="bg-red-500">{{ $message }}</p>
                                            @enderror
                                        @else
                                            <p class="text-gray-600 mt-2"> {{ $reply->text }} </p>

                                            @if ($reply->user_id == auth()->user()->id)
                                                <button id="EditButton" wire:click='EditComment({{ $reply->id }})'
                                                    wire:loading.attr="disabled"
                                                    class="hover:text-yellow-800 duration-200 text-yellow-500 ml-2">Chỉnh
                                                    sửa</button>
                                                <button wire:click='DeleteComment({{ $reply->id }})'
                                                    wire:loading.attr="disabled"
                                                    class="hover:text-red-800 duration-200 text-red-500 ml-2">Xóa</button>
                                            @endif
                                        @endif
                                    @endauth

                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach

        </div>
    </div>



    <!--COMMENT INPUT-->
    <div wire:ignore id="star-rating" class=" w-11/12 ml-20" style="color: yellow">
        <i class="fa-regular fa-star" data-index="1" style="color: yellow"></i>
        <i class="fa-regular fa-star" data-index="2" style="color: yellow"></i>
        <i class="fa-regular fa-star" data-index="3" style="color: yellow"></i>
        <i class="fa-regular fa-star" data-index="4" style="color: yellow"></i>
        <i class="fa-regular fa-star" data-index="5" style="color: yellow"></i>
    </div>
    <form wire:submit='AddComment' class="w-11/12 mx-auto">
        <div class="w-full px-3 mb-2 mt-6">
            <textarea wire:model='commentcontent'
                class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white"
                name="body" placeholder="Comment" required></textarea>
        </div>
        <div class="w-full flex justify-end px-3 my-3">
            <input type="submit" wire:loading.attr="disabled"
                class="px-2.5 py-1.5 hover:cursor-pointer hover:bg-green-700 transition-colors duration-300 rounded-md text-white text-lg bg-green-500"
                value='Bình luận'>
        </div>
    </form>
</div>


<!--CART BUTTON-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartButton = document.getElementById('CartButton');
        // Add a click event listener to the button
        cartButton.addEventListener('click', function() {
            let flashMessage = document.getElementById('flash-message');
            let flashMessageText = document.getElementById('flash-message-text');
            // Show the flash message
            flashMessage.classList.remove('hidden');

            // Hide the flash message after 2 seconds
            setTimeout(() => {
                flashMessage.classList.add('hidden');
            }, 2000);
        });
        Livewire.on('flashMessage', (message) => {

        });
        Livewire.on('AddToCart', (event) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500
            });
        });
    });
</script>

<!--STAR UPDATE-->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const stars = document.querySelectorAll('#star-rating i');
        stars.forEach(star => {
            star.addEventListener('click', () => {
                selectedRating = parseInt(star.getAttribute('data-index'));
                updateStars(selectedRating);
            });
        });

        function updateStars(rating) {
            let $StarRating = @json($StarRating ?? 0);
            $StarRating = rating;
            stars.forEach(star => {
                const index = parseInt(star.getAttribute('data-index'));
                if (index <= rating) { //SOILD
                    star.className = 'fa-solid fa-star';
                } else {
                    star.className = 'fa-regular fa-star';
                }
            });
            Livewire.dispatch('updateStarRating', {
                star: $StarRating
            });

        }
        //UPDATE STAR AFTER COMMENT
        Livewire.on('UpdateStar', (message) => {
            stars.forEach(star => {
                star.className = '';
                star.classList.add('fa-regular');
                star.classList.add('fa-star');
            })
        });
    });
</script>

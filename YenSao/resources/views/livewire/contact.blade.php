@section('title','Liên hệ')
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
        <div
            class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            <iframe class=" absolute inset-0" 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15591.806213024745!2d109.1880709!3d12.3190478!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x868881973675c531!2sC%C3%B4ng%20Ty%20TNHH%20SX-TM-XNK%20D%26T!5e0!3m2!1svi!2s!4v1662522889214!5m2!1svi!2s"
                width="100%" height="450" allowfullscreen="allowfullscreen"></iframe>
            <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                <div class="lg:w-1/2 px-6">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">Địa chỉ</h2>
                    <p class="mt-1">QL1A, Vĩnh Phương, Nha Trang, Khánh Hòa</p>
                </div>
                <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                    <a class="text-red-500 leading-relaxed">DTVietnam@gmail.com</a>
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                    <p class="leading-relaxed">123-456-7890</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Feedback</h2>
            <p class="leading-relaxed mb-5 text-gray-600">Gửi thông tin liên lạc cho chúng tôi
            </p>
            <div class="relative mb-4">
                <label for="name" class="leading-7 text-sm text-gray-600">Tên</label>
                <input wire:model.live='name' type="text" id="name" name="name"
                    class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input wire:model.live='email' type="email" id="email" name="email"
                    class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="message" class="leading-7 text-sm text-gray-600">Nội dung</label>
                <textarea wire:model.live='content' id="message" name="message"
                    class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            </div>
            <button wire:click='SendEmail'
                class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Gửi</button>
            <p class="text-xs text-gray-500 mt-3">Cảm ơn bạn đã liên lạc.</p>
        </div>
    </div>
</section>

<div class=" bg-gray-900 gap-5 flex">
    @include('layout.AdminSideBar')

    <!-- Modal toggle -->
    <div wire:ignore id="default-modal" tabindex="-1" aria-hidden="true"
        class=" hidden overflow-y-auto overflow-x-hidden  fixed z-50 flex justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button onclick="hidemodal()" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg
                 text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button onclick="DeleteShip()" type="button" id="delete-button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-lg  ">Delete</button>
                </div>
            </div>
        </div>
        <!--CALENDAR-->
    </div>
    <div wire:ignore class="w-full text-white font-bold" id='calendar'></div>
</div>



<!--DATE FORMAT-->
<script>
    function formatDateForDatabase(date) {
        var year = date.getFullYear();
        var month = String(date.getMonth() + 1).padStart(2, '0');
        var day = String(date.getDate()).padStart(2, '0');
        var hours = String(date.getHours()).padStart(2, '0');
        var minutes = String(date.getMinutes()).padStart(2, '0');
        var seconds = String(date.getSeconds()).padStart(2, '0');
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }
</script>

<!--HIDE MODAL-->
<script>
    function hidemodal() {
        var modal = document.getElementById('default-modal');
        modal.classList.add('hidden');
    }
</script>
<!--DELETE SHIP-->
<script>
    function DeleteShip(eventId) {
        Livewire.dispatch('deleteShip', {
            id: eventId
        });
        hidemodal();
    }
</script>


<!--CALENDAR-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var event = @json($events);
        var Aevent;
        console.log(event);
        var IsDraging = false;
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            //==========CUSTOM CSS==============
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: 'Hôm Nay',
                month: 'Tháng',
                week: 'Tuần',
                day: 'Ngày',
                list: 'Danh Sách'
            },
            locale: 'vi',
            selectable: true,
            editable: true,
            events: event,

            //=============EVENT===========
            //CLICK EVENT
            eventClick: function(info) {
                var modal = document.getElementById('default-modal');
                modal.classList.remove('hidden');
                Aevent = info.event.id;
                console.log(Aevent);
                document.getElementById('delete-button').onclick = function() {
                    DeleteShip(Aevent);
                };
            },
            //DRAG EVENT
            eventDrop: function(info) {
                Livewire.dispatch('UpdateShip', {
                    id: info.event.id,
                    start: formatDateForDatabase(info.event.start),
                    end: formatDateForDatabase(info.event.end)
                })

            },

        });
        Livewire.on('UpdateCalendar', () => {
            event = @json($events);
            console.log(event);
            calendar.refetchEvents();
        })
        calendar.render();
       

    });
</script>

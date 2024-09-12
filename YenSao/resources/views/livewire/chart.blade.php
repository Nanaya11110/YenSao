<div class=" bg-gray-900">
    <!--BUTTON-->
    <div class=" absolute ml-20 mt-2">
        <select id="chartype" class=" w-20 h-8 rounded-sm border border-gray-100 bg-gray-800 text-white font-bold">
            <option value="bar">Bar</option>
            <option value="line">Line</option>
        </select>
     
        <button wire:click='productsUpdated' class="bg-yellow-500 w-20 mx-5">Update</button>
    </div>
    <div class="flex">
        @include('layout.AdminSideBar')
        <div class=" w-full h-full grid grid-cols-2 gap-2 mt-5">
            <!--BAR CHART-->
            <div class=" m-5 w-full h-72 ">
                <canvas wire:ignore id="myChart" class=" min-w-full  min-h-full"></canvas>
            </div>
            <!--LINE CHART-->
            <div class=" m-5 w-full h-72 ">
                <canvas wire:ignore id="myChart2" class=" w-full h-full"></canvas>
            </div>
            <!--LINE CHART-->
            <div class=" m-5 w-full h-72 bg-red-600">
                <canvas wire:ignore id="myChart2" class=" w-full h-full"></canvas>
            </div>
            <!--LINE CHART-->
            <div class=" m-5 w-full h-72 bg-red-600">
                <canvas wire:ignore id="myChart2" class=" w-full h-full"></canvas>
            </div>

        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart');
    const ctx2 = document.getElementById('myChart2');
    let data = @json($product);
    let name = [];
    let price = [];
    data.forEach(item => {
        name.push(item.name);
    });
    data.forEach(item => {
        price.push(item.price);
    });
    //console.log(price);

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: name, // THE NAME ARRAY
            datasets: [{
                label: "Giá",
                data: price,
                backgroundColor:  'rgba(255, 99, 132, 0.2)',
                borderWidth: 1
            },
            {
                label: "Giá",
                data: price,
                backgroundColor:  'rgba(00, 00, 255, 0.2)',
                borderWidth: 1
            }, ]
        },
        options: {
            maintainAspectRatio: false
        },
    });
    var SecondChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: name, // THE NAME ARRAY
            datasets: [{
                label: "Giá",
                data: price,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)',

                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)',

                ],
                borderWidth: 1
            }, ]
        },

    });
    var chartoption = document.getElementById('chartype')
    chartoption.addEventListener('change', function(){
        let option = chartoption.options[chartoption.selectedIndex].value;
        myChart.config.type = option;
        myChart.update();
    });

    window.addEventListener('test', event => {
        let data = event.__livewire.params[0];
        price =[];
        // console.log(event.__livewire.params[0].id);
        console.log(data);
        myChart.data.labels = [data.name];
        myChart.data.datasets.data = data.price;
        myChart.update();
});
</script>

@section('title', 'Admin Home Page')

<div class = "body bg-white dark:bg-[#0F172A]">
    @include('layout.AdminSideBar')
    <!-- CONTENT -->
    <div class = "content ml-12 transform ease-in-out duration-500  px-2 md:px-5 pb-4 ">
        <div class=" rounded-md p-5">
            <!--TOTAL INFO-->
            <div class = " my-5 -mx-2 bg-gray-800 p-5 rounded-lg text-white">
                <h2 class=" font-bold text-2xl my-3">Thống kê</h2>
                <div class=" flex flex-wrap">
                    <!--TOTAL PRODUCT-->
                    <div class = "w-full md:w-1/2 lg:w-1/3 p-2 ">
                        <div class = "flex items-center flex-row w-full bg-gray-900 rounded-md p-3">
                            <div
                                class = "flex text-indigo-500 dark:text-white items-center bg-gray-800 p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                <i class="fa-solid fa-boxes-stacked text-2xl"></i>
                            </div>
                            <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                <div class = "text-xs whitespace-nowrap">
                                    Tổng sản phẩm
                                </div>
                                <div class = "">
                                    {{ $TotalProductCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--TOTAL USER-->
                    <div class = "w-full lg:w-1/3 p-2">
                        <div class = "flex items-center flex-row w-full bg-gradient-to-r bg-gray-900 rounded-md p-3">
                            <div
                                class = "flex text-indigo-500 dark:text-white items-center bg-gray-800 p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                <i class="fa-solid fa-user-group text-2xl"></i>
                            </div>
                            <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                <div class = "text-xs whitespace-nowrap">
                                    Tổng người dùng
                                </div>
                                <div class = "">
                                    {{ $TotalUserCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--TOTAL POST-->
                    <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                        <div class = "flex items-center flex-row w-full bg-gray-900 rounded-md p-3">
                            <div
                                class = "flex text-indigo-500 dark:text-white items-center bg-gray-800 p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                <i class="fa-solid fa-newspaper text-2xl"></i>
                            </div>
                            <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                <div class = "text-xs whitespace-nowrap">
                                    Tổng bài viết
                                </div>
                                <div class = "">
                                    {{ $TotalPostCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--CHART SECTION-->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!--LINE AND BAR-->
                <div class=" w-full bg-gray-800 rounded-lg p-10">
                    <h2 class=" text-white font-semibold text-3xl mb-5">Phân hàng</h2>
                    <div class=" mb-5">
                        <select id="chartype" class=" text-center w-20 h-8 rounded-sm border border-gray-100 bg-gray-800 text-white font-bold">
                            <option value="bar">Bar</option>
                            <option value="line">Line</option>
                        </select>
                    </div>
                    <!--CANVA-->
                    <canvas wire:ignore class="bg-gray-900" id="lineBar"></canvas>
                </div>
                <!--PIE-->
                <div class=" w-full bg-gray-800 rounded-lg p-10">
                    <h2 class=" text-white font-semibold text-3xl mb-5">Cách tiếp cận</h2>
                    <!--CANVA-->
                    <canvas wire:ignore  class="bg-gray-900 max-h-96" id="pie"></canvas>
                </div>
            </div>
            <!--TOP PRODUCT-->
            <div class=" rounded-lg bg-gray-800 w-full my-5 p-10">
                <h2 class="text-white font-bold text-2xl mb-5">Sản phẩm nổi bật</h2>
                  <table class=" w-full text-white">
                    <tr >
                        <th>STT</th>
                        <th>Name</th>
                        <th>Độ nổi</th>
                        <th>Sales</th>
                    </tr>
                    <?php $index =0; ?>
                    @foreach ($TotalProduct as $index => $product)
                    <?php 
                        $index ++;
                        $percant = $product->click/$totalproductclick * 100;
                        $percant = number_format($percant, 0);
                        $bgColors = ['bg-red-500', 'bg-green-500', 'bg-blue-500', 'bg-purple-500'];
                        $borderColors = ['border-red-500', 'border-green-500', 'border-blue-500', 'border-purple-500'];
                        $textColors = ['text-red-500', 'text-green-500', 'text-blue-500', 'text-purple-500'];

                        $bgColor = $bgColors[$index % count($bgColors)];
                        $textColor = $textColors[$index % count($textColors)];
                        $borderColor = $borderColors[$index % count($borderColors)];
                    ?>
                    <tr>
                        <td>{{$index}}</td>
                        <td>{{$product->name}}</td>
                        <td><div class=" bg-black/25 w-40 rounded-md h-2 mx-auto"><div style="width: {{$percant}}%" class=" rounded-md h-full {{$bgColor}}"></div></div></td>
                        <td><div class=" h-10  {{$bgColor}} bg-opacity-25 rounded-sm border {{$borderColor}} font-bold
                             {{$textColor}} mx-auto flex justify-center object-center pt-2">{{$percant}}%</div></td>
                    </tr>
                    @endforeach
                    
                   
                </table>
            </div>
             <!--CUSTOMER TABLE-->
             <div class=" rounded-lg bg-gray-800 w-full my-5 p-10">
                <h2 class="text-white font-bold text-2xl mb-5">Đơn hàng</h2>
                <table class=" w-full ">
                    <tr class=" text-gray-500">
                        <th><input type="checkbox"></th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SDT</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền chi</th>
                        <th>Đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Tương tác</th>
                    </tr>
                    @foreach ($ship as $ship)
                    @if ($editable == $ship->id)
                    <tr>
                        <form>
                            <td><input class=" " type="checkbox"></td>
                            <td>
                                <input wire:model.debounce.200ms="name"  value="{{$name}}" type="text" class="bg-gray-800 text-white border border-gray-700 rounded-lg p-1 w-full focus:ring-2 focus:ring-gray-500 focus:outline-none">
                                @error('name')
                                <div class="bg-red-500 text-sm text-black">{{ $message }}</div>
                                @enderror
                            </td>
                            <td><input wire:model.debounce.200ms="email" value="{{$email}}" type="text" class="bg-gray-800 text-white border border-gray-700  rounded-lg p-1 w-full focus:ring-2 focus:ring-gray-500 focus:outline-none">
                                @error('email')
                                <div class="bg-red-500 text-sm text-black">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input wire:model.debounce.200ms="phone" value="{{$phone}}" type="text" class="bg-gray-800 text-white border border-gray-700  rounded-lg p-1 w-full focus:ring-2 focus:ring-gray-500 focus:outline-none">
                                @error('phone')
                                <div class="bg-red-500 text-sm text-black">{{ $message }}</div>
                                @enderror
                            </td>
                            <td><input wire:model.debounce.200ms="address" value="{{$address}}" type="text" class="bg-gray-800 text-white border border-gray-700  rounded-lg p-1 w-full focus:ring-2 focus:ring-gray-500 focus:outline-none">
                                @error('address')
                                <div class="bg-red-500 text-sm text-black">{{ $message }}</div>
                                @enderror
                            </td>
                            <td><input wire:model.debounce.200ms="cost"  value="{{$cost}}" type="text" class="bg-gray-800 text-white border border-gray-700  rounded-lg p-1 w-full focus:ring-2 focus:ring-gray-500 focus:outline-none">
                                @error('cost')
                                <div class="bg-red-500 text-sm text-black">{{ $message }}</div>
                                @enderror
                            <td class="w-1/3"> 
                              <ul class="text-white"> 
                                 @foreach ($productDetail as $product)
                                <li>{{$product['quantity']}} - {{$product['name']}}</li>
                                
                                @endforeach
                             
                                
                               </ul>
                            </td>
                            <td>
                                <select wire:model.live='status' class="bg-black/25 text-white h-10 p-2 border-none outline-none cursor-pointer custom-select">
                                    <option value="0" class="bg-gray-800 text-white font-bold">Created</option>        
                                    <option value="1" class="bg-gray-800 text-white font-bold">Update</option>        
                                    <option value="2" class="bg-gray-800   text-white font-bold">Delivery</option>        
                                </select>
                            </td>
                            <td class="text-white">
                                <button wire:click='EditAble({{$ship}})'><i class="fa-solid fa-ban mr-2"></i></button>
                                <button wire:click='UpdateShip({{$ship}})'><i class="fa-solid fa-check"></i></button>
                            </td>
                        </form>
                    </tr>
                    @else 
                    <tr class="text-white">
                        <td><input type="checkbox"></td>
                        <td>{{$ship->name}}</td>
                        <td>{{$ship->email}}</td>
                        <td>{{$ship->phone}}</td>
                        <td>{{$ship->address}}</td>
                        <td>{{$ship->cost}}$</td>
                        {{-- $ship->productDetail[0]["name"] --}}
                        <td><ul>
                            @foreach ($ship->productDetail as $product )
                            <li>{{$product['quantity']}}  -  {{$product['name']}}</li>    
                            @endforeach
                            </ul>
                        </td>
                        @if ($ship->status == 0)
                            <td class=" text-red-600 font-bold">Chưa giao</td>
                        @else @if ($ship->status == 1)
                            <td class="text-yellow-500 font-bold">Đang giao</td>                            
                            @else <td class="text-green-500 font-bold">Đã giao</td>
                            @endif
                        @endif
                        <td >
                            <button wire:click='EditAble({{$ship}})'>
                                <i class="fa-solid fa-pencil  mr-2"></i></button>
                            <button wire:click='DeleteShip({{$ship}})'><i class="fa-solid fa-trash text-red-500"></i></button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <style>
        table{
        }
        th {
            padding: 5px;
            border-bottom: 1px solid gray;
        }
        td {
            text-align: center;
            border-bottom: 1px solid gray;
            padding: 5px;
            height: 20px;
            }
        tr{
            height: 50px;
            margin-top: 5px;
            padding: 5px;
        }
       
    
           
    
    </style>
</div>


<script>
    //VARIBLES
    const ctx = document.getElementById('lineBar');
    const ctx2 = document.getElementById('pie');
    let data = @json($TotalProduct);
    let name = [];
    let price = [];
    data.forEach(element => {
        name.push(element.name);
    });
    data.forEach(element => {
        price.push(element.price);
    });


    //CHART
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5','Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [
                {
                    label: 'Số lượng bán ra',
                    data: [10, 20, 15, 30, 20, 55, 15, 20 , 50, 55, 60,12],
                    backgroundColor:'rgb(255, 00, 00,0.7 )',
                    borderColor: 'rgb(255,00, 00)',
                    fill: {
                        target: 'origin',
                        above: 'rgb(255,00,00,0.2)',
                    },
                    borderWidth: 2
                },
                {
                    label: 'Số lượng bán ra',
                    data: [10, 20, 15, 25, 30, 35, 45, 40, 50, 55, 60,12],
                    backgroundColor:'rgb(00, 255, 00,0.7 )',
                    borderColor: 'rgb(00,255, 00)',
                    fill: {
                        target: 'origin',
                        above: 'rgb(00,255,00,0.2)',
                    },
                    borderWidth: 2
                },
                {
                    label: 'Số lượng nhập hàng',
                    data: [50, 55, 25, 55, 65, 75, 35, 12, 20, 30, 40,30],
                    backgroundColor: 'rgb(00, 00, 255,0.7 )',
                    borderColor: 'rgb(00,00, 255)',
                    fill: {
                        target: 'origin',
                        above: 'rgb(00,00,255,0.2)',
                    },
                    borderWidth: 2
                },
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var PieChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Online','Offline'],
            datasets: [{
                data: [85,15],
                backgroundColor: [
                    'rgb(255, 99, 132)', // Pink
                    'rgb(54, 162, 235)', // Blue
                    'rgb(255, 205, 86)', // Yellow
                    'rgb(75, 192, 192)', // Teal
                    'rgb(153, 102, 255)', // Purple
                    'rgb(255, 159, 64)', // Orange
                    'rgb(201, 203, 207)', // Gray
                    'rgb(255, 99, 71)', // Tomato red
                    'rgb(34, 193, 195)', // Cyan
                    'rgb(253, 187, 45)', // Gold
                    'rgb(100, 221, 23)' // Green
                ],
                hoverBackgroundColor: [
                    'rgb(200, 50, 100)', //Dark Pink
                    'rgb(10, 100, 200)', // Dark Blue
                    'rgb(200, 150, 50)', // Dark Yellow
                ],
                hoverOffset: 25 
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    //BUTTON
    var chartoption = document.getElementById('chartype')
    chartoption.addEventListener('change', function() {
        let option = chartoption.options[chartoption.selectedIndex].value;
        myChart.config.type = option;
        myChart.update();
    });
</script>

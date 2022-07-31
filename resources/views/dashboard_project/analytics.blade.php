@extends('layouts.home')

@section('content')

<div class="navbar_backend_overview">
    @include('layouts.nav-mobile-business')

    @include('layouts.nav-desktop')
</div>


<div class="background_dashbord_overview">
    <div class="container">
        <div class="row dashbord_backend_overview">
            <div class="col-lg-3">
                <h4>Dashboard</h4>
                @include('layouts.project-sidebar')
            </div>
            <div class="col-md-9 recent_update">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="circle_chart">
                            <div style="width:100px;height:100px;margin:auto">
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </div>
                            <div style="width:100px;height:100px;margin:auto">
                                <canvas id="myChart2" width="400" height="400"></canvas>
                            </div>

                            <div style="width:100px;height:100px;margin:auto">
                                <canvas id="myChart3" width="400" height="400"></canvas>
                            </div>
                            <div style="width:100px;height:100px;margin:auto">
                                <canvas id="myChart4" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div style="width:100%;height:200px;margin-top:50px">
                            <canvas id="myChart5"style="width:100%" height="300"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div style="width:100%;height:200px;margin-top:100px">
                            <canvas id="myChart6" style="width:100%" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("layouts.footer-desktop")

    @include('layouts.button_menu_project')

    @include("layouts.footer-mobile")

</div>

@endsection



@section('chart_script')
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        innerRadius: "10%",
        data: {
            datasets: [{
                data: [16,7 , 3],
                backgroundColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderWidth: 1,
                width:1,

            }]
        },
        options: {

            cutoutPercentage: 80,
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    } ,
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }]
            }
        },

    });

    var ctx2 = document.getElementById('myChart2');
    var myChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [16,7 , 3],
                backgroundColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderWidth: 1,
                width:1,

            }]
        },
        options: {
            cutoutPercentage: 80,
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    } ,
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }]
            }
        }
    });

    var ctx3 = document.getElementById('myChart3');
    var myChart = new Chart(ctx3, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [16,7 , 3],
                backgroundColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderWidth: 1,
                width:1,

            }]
        },
        options: {
            cutoutPercentage: 80,
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    } ,
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }]
            }
        }
    });

    var ctx4 = document.getElementById('myChart4');
    var myChart = new Chart(ctx4, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [16,7 , 3],
                backgroundColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderColor: [
                    '#1F78B4',
                    '#A6CEE3',
                    '#B2DF8A',

                ],
                borderWidth: 1,
                width:1,

            }]
        },
        options: {
            cutoutPercentage: 80,

            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    } ,
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }]
            }
        }
    });


    var ctx5 = document.getElementById('myChart5');
    var myChart = new Chart(ctx5, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                ],
            }]
        },
        options: {
            cutoutPercentage: 90,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        drawOnChartArea: false,
                        offsetGridLines :false,
                    } ,
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }]
            },
        }
    });




    new Chart(document.getElementById("myChart6"), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                data: [168,370,178,390,103,376,208,447,275,468,234,453],
                label:" ",
                borderColor: "#1F78B4",
                fill: false
            },
            ]
        },
        options: {
            title: {
                display: false,
                text: ''
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        drawOnChartArea: false,
                        offsetGridLines :false,
                    } ,
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }]
            }
        }
    });
</script>
@endsection
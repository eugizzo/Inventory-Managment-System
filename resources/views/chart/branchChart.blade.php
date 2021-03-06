@extends('layouts.header')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Purchase-Sales Chart</h4>
                        </div>
                        <div class="card-body">
                            <div class="recent-report__chart">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product-Quantity Chart</h4>
                        </div>
                        <div class="card-body">
                            <div class="recent-report__chart">
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Purchase-Sales-Profit Chart</h4>
                        </div>
                        <div class="card-body">
                            <div class="recent-report__chart">
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
</section>
</div>
@endsection

@push('scripts')
<script>
    function chart1() {
        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Purchases',

                data: <?= $stockIn ?>
            }, {
                name: 'Sales',
                data: <?= $stockOut ?>
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                title: {
                    text: 'Months'
                },
                labels: {
                    style: {
                        colors: '#9aa0ac',
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Amount in Rwf'
                },
                labels: {
                    style: {
                        color: '#9aa0ac',
                    }
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Rwf " + val
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        chart.render();


    }

    function chart3() {
        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Purchases Value',

                data: <?= $purchasedValue ?>
            }, {
                name: 'Sales Value',
                data: <?= $soldValue ?>
            }, {
                name: 'Remaning Quantity Value',
                data: <?= $remainingValue ?>
            }, {
                name: 'Profit/Loss',
                data: <?= $profitValue ?>
            }],
            xaxis: {
                categories: <?= $productName ?>,
                title: {
                    text: 'Amount in Rwf'
                },
                labels: {
                    style: {
                        colors: '#9aa0ac',
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Product Names'
                },
                labels: {
                    style: {
                        color: '#9aa0ac',
                    }
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Rwf " + val
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart3"),
            options
        );

        chart.render();


    }

    function chart2() {
        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Purchases Quantity',

                data: <?= $purchased ?>
            }, {
                name: 'Sales Quantity',
                data: <?= $sold ?>
            }, {
                name: 'Remaning Quantity',
                data: <?= $remaining ?>
            }],
            xaxis: {
                categories: <?= $name ?>,
                title: {
                    text: 'Quantity'
                },
                labels: {
                    style: {
                        colors: '#9aa0ac',
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Product Names'
                },
                labels: {
                    style: {
                        color: '#9aa0ac',
                    }
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart2"),
            options
        );

        chart.render();


    }
</script>

@endpush
<!-- General JS Scripts -->
<script src="/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<!-- <script src="/assets/js/page/chart-apexcharts.js"></script> -->
<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="/assets/js/custom.js"></script>
<!-- JS Libraies -->
<script src="/assets/bundles/echart/echarts.js"></script>
<!-- Page Specific JS File -->
<script src="/assets/js/page/chart-echarts.js"></script>

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
                            <h4>Product-Profit Chart</h4>
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
                            <h4>Branch-Profit Chart</h4>
                        </div>
                        <div class="card-body">
                            <div class="recent-report__chart">
                                <div id="chart2"></div>
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

                data: <?= $purchased ?>
            }, {
                name: 'Sales Value',
                data: <?= $sold ?>
            }, {
                name: 'Remaning Quantity Value',
                data: <?= $remaining ?>
            }, {
                name: 'Profit/Loss',
                data: <?= $profit ?>
            }],
            xaxis: {
                categories: <?= $name ?>,
                labels: {
                    style: {
                        colors: '#9aa0ac',
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Rwf'
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

    function chart2() {
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
                name: 'Branch Purchases',
                data: <?= $stockIn ?>
            }, {
                name: 'Branch Sales',
                data: <?= $stockOut ?>
            }, {
                name: 'Branch Remaining Stock',
                data: <?= $totalRemainingStock ?>
            }, {
                name: 'Branch profit',
                data: <?= $totalprofitValue ?>
            }],
            xaxis: {
                categories: <?= $branchName ?>,
                labels: {
                    style: {
                        colors: '#9aa0ac',
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Quantity'
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://coderthemes.com/hyper/saas/assets/images/favicon.ico">

    <!-- third party css -->
    <link href="https://coderthemes.com/hyper/saas/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="https://coderthemes.com/hyper/saas/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://coderthemes.com/hyper/saas/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <style>
        .thumb-cover {
            overflow: hidden;
        }
        .thumb-cover img {
            width: 100%!important;
            height: 100%!important;
            object-fit: cover!important;
        }
        img {
            display: block;
            padding: 0;
            outline: none;
            border: none;
        }
        .post-image-thumb{
            display: block;
            color: #333;
            height: 230px;
            width: 230px;
            overflow: hidden;
        }
        .with-550px{
            width: 500px;
        }
        .text{
            height: 750px;
        }
    </style>
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="https://coderthemes.com/hyper/saas/assets/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="https://coderthemes.com/hyper/saas/assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="https://coderthemes.com/hyper/saas/assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="https://coderthemes.com/hyper/saas/assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-item">
                        <a class="side-nav-link" href="{{asset('/')}}">
                            <span> Trang chủ </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link" href="{{asset('/chart')}}">
                            <span> Biểu đồ </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                            <span> Bài viết </span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('posts.index') }}">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.create') }}">Tạo mới bài viết</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @if( session('message') != null)
                <li class="alert alert-success">{{ session('message') }}</li>
                @endif
                <!-- Start Content-->
                <div class="container-fluid">
                    @section('main-content')
                    @show
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>


                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                    <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                </div>
            </div> <!-- end padding-->

        </div>
    </div>
    <div id="chart" style="height: 250px;"></div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="https://coderthemes.com/hyper/saas/assets/js/vendor.min.js"></script>
    <script src="https://coderthemes.com/hyper/saas/assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="https://coderthemes.com/hyper/saas/assets/js/vendor/apexcharts.min.js"></script>
    <script src="https://coderthemes.com/hyper/saas/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="https://coderthemes.com/hyper/saas/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="https://coderthemes.com/hyper/saas/assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @include('ckfinder::setup')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'text', {
        height: '550px',
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
    } );
    </script>



    <script>
        var months = [];
        for (var i = 0; i < 12; i++) {
            var d = new Date((i + 1) + '/1');
            months.push(d.toLocaleDateString(undefined, {
                month: 'short'
            }));
        }
        const data = {
            labels: months,
            datasets: [{
                label: 'Số lượng bài viết (' + <?= json_encode($time ?? date('Y')) ?> + ')',
                data: <?= json_encode($data ?? []) ?>,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script>
        var color = [];
        for (i = 0; i <= 19; i++) {
            color[i] = `rgb(${[1,2,3].map(x=>Math.random()*256|0)})`;
        }
        const dataDoughnut = <?= json_encode($catePost ?? []) ?>;

        const name = Object.keys(dataDoughnut).map((key) => String(key));
        const count = Object.keys(dataDoughnut).map((key) => dataDoughnut[key]);

        const datas = {
            labels: name,
            datasets: [{
                label: 'My First Dataset',
                data: count,
                backgroundColor: color,
                hoverOffset: 4
            }]
        };
        const configs = {
            type: 'doughnut',
            data: datas,
        };

        const myCharts = new Chart(
            document.getElementById('chartCate'),
            configs
        );
    </script>

    <script>
        const labels = <?= json_encode($lastMonth ?? []) ?>;
        const dataMonth = {
            labels: labels,
            datasets: [{
                label: 'Số lượng bài viết',
                data: <?= json_encode($postChartMonth ?? []) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)'
                ],
                borderWidth: 1
            }]
        };

        const configMonth = {
            type: 'bar',
            data: dataMonth,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const myChartMonth = new Chart(
            document.getElementById('chartMonth'),
            configMonth
        );
    </script>

    <script>
        $(function() {
            'use strict';
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var checkin = $('#timeCheckIn').datepicker({
                onRender: function(date) {
                    return date.valueOf() < now.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('#timeCheckOut')[0].focus();
            }).data('datepicker');
            var checkout = $('#timeCheckOut').datepicker({
                onRender: function(date) {
                    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                checkout.hide();
            }).data('datepicker');
        });
    </script>

</body>

</html>
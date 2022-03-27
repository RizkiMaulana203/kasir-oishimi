<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title><?= $title; ?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(''); ?>/logo.png">
    <link rel="stylesheet" href="<?= base_url(''); ?>/vendor/chartist/css/chartist.min.css">
    <link href="<?= base_url(''); ?>/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="<?= base_url(''); ?>/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>/css/style.css" rel="stylesheet">
    <!-- datatable print -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- dropify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <!-- sweetalert 2 -->
    <link rel="stylesheet" href="<?= base_url(''); ?>/vendor/sweetalert2/dist/sweetalert2.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?= base_url('home'); ?>" class="brand-logo">
                <img width="50" height="50" src="<?= base_url(''); ?>/logo.png">

                <img class="brand-title" width="77" height="25" src="<?= base_url(''); ?>/nama.png">

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->



        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="input-group search-area right d-lg-inline-flex d-none">
                                <!-- <input type="text" class="form-control" placeholder="Find something here..."> -->
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="javascript:void(0)">

                                        </a>
                                    </span>
                                </div> -->
                            </div>
                        </div>
                        <ul class="navbar-nav header-right main-notification">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="#">
                                    <i id="icon-light" class="fa fa-sun-o"></i>
                                    <i id="icon-dark" class="fa fa-moon-o"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewbox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                                    </svg>
                                    <svg id="icon-minimize" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
                                        <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="<?= base_url('/foto/user/' . session()->get('foto')); ?>" width="20" alt="" class="rounded-circle">
                                    <div class="header-info">
                                        <span><?= session()->get('nama_user') ?></span>
                                        <small><?php if (session()->get('id_level') == 1) {
                                                    echo 'Administrator';
                                                } elseif (session()->get('id_level') == 2) {
                                                    echo 'Manager';
                                                } elseif (session()->get('id_level') == 3) {
                                                    echo 'Kasir';
                                                } else {
                                                    echo 'Unknown';
                                                }
                                                ?></small>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url('user/profile'); ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <div class="main-profile">
                    <div class="image-bx">
                        <img src="<?= base_url('/foto/user/' . session()->get('foto')); ?>" class="rounded-circle" alt="100x100" width="45px">
                        <!-- <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a> -->
                    </div>
                    <h5 class="name"><span class="font-w400">Hello,</span> <?= session()->get('nama_user') ?></h5>
                </div>
                <?php if (session()->get('id_level') == 1) { ?>
                    <ul class="metismenu" id="menu">
                        <li class="nav-label first">Main Menu</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-server"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= base_url('home'); ?>">Dashboard</a></li>
                            </ul>

                        </li>
                        <li class="nav-label">Users</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="nav-text">Users</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= base_url('user/user'); ?>">Manage Users</a></li>
                                <li><a href="<?= base_url('user/user_new'); ?>">Tambah</a></li>
                                <li><a href="<?= base_url('user/user_log'); ?>">User Log</a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-label">Menu</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-utensils"></i>
                                <span class="nav-text">Menu</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= base_url('menu/menu'); ?>">Manage menu</a></li>
                                <li><a href="<?= base_url('menu/menu_new'); ?>">Tambah</a></li>

                            </ul>
                        </li>
                        <li class="nav-label">Order</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-wallet"></i>
                                <span class="nav-text">Order</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= base_url('order/detail_order_new'); ?>">Order</a></li>
                                <li><a href="<?= base_url('order/order/detail_order'); ?>">Detail Order</a></li>
                                <li><a href="<?= base_url('order/transaksi'); ?>">Transaksi</a></li>
                                <li><a href="<?= base_url('order/print'); ?>">Laporan</a></li>

                            </ul>
                        </li>
                    </ul>
                <?php } ?>

                <?php if (session()->get('id_level') == 2) { ?>
                    <ul class="metismenu" id="menu">
                        <li class="nav-label">Order</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-wallet"></i>
                                <span class="nav-text">Order</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= base_url('order/print'); ?>">Laporan</a></li>


                            </ul>
                        </li>
                    </ul>
                <?php } ?>

                <?php if (session()->get('id_level') == 3) { ?>
                    <ul class="metismenu" id="menu">
                        <li class="nav-label">Order</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-wallet"></i>
                                <span class="nav-text">Order</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?= base_url('order/detail_order_new'); ?>">Order</a></li>
                                <li><a href="<?= base_url('order/order/detail_order'); ?>">Detail Order</a></li>
                                <li><a href="<?= base_url('order/transaksi'); ?>">Transaksi</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>

                <div class="copyright">
                    <p><strong>Oishimi Dashboard</strong> © <?php echo date("Y"); ?> All Rights Reserved</p>
                    <p class="fs-12">Made with <span class="heart"></span> by Diablo</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <?= $this->renderSection('content'); ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">Diablo</a> <?php echo date("Y"); ?></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->





        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src="<?= base_url(''); ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url(''); ?>/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url(''); ?>/vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="<?= base_url(''); ?>/vendor/peity/jquery.peity.min.js"></script>

    <!-- Apex Chart -->
    <!-- <script src="<?= base_url(''); ?>/vendor/apexchart/apexchart.js"></script> -->

    <!-- Dashboard 1 -->
    <script src="<?= base_url(''); ?>/js/dashboard/dashboard-1.js"></script>

    <script src="<?= base_url(''); ?>/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?= base_url(''); ?>/js/custom.min.js"></script>
    <script src="<?= base_url(''); ?>/js/deznav-init.js"></script>
    <script src="<?= base_url(''); ?>/js/demo.js"></script>
    <script src="<?= base_url(''); ?>/js/styleSwitcher.js"></script>

    <!-- datatables -->
    <script src="<?= base_url(''); ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(''); ?>/js/plugins-init/datatables.init.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

        });
    </script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/pagination/select.js"></script>

    <!-- print datatable -->
    <script>
        $(document).ready(function() {
            $('#print').DataTable({
                // scrollY: '500px',
                sPaginationType: 'listbox',
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdf',
                        orientation: 'potrait',
                        pageSize: 'Legal',
                        title: 'Data Transaksi',
                        // download: 'open'
                    },
                    'excel', 'print', 'csv', 'copy'
                ]
            })
        });
    </script>


    <!-- date -->

    <!-- date -->


    <!-- notif alert -->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
    <!-- akhir notif alert -->

    <!-- dropify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });


        $('.dropify').dropify({
            messages: {
                'default': 'Drag file disini atau click',
                'replace': 'Drag atau click untuk merubah',
                'remove': 'Hapus',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>

    <!-- sweetalert 2 -->
    <script src="<?= base_url(''); ?>/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Sweetalert User -->

    <script>
        const flashdata = $('.flashdata').data('flashdata');

        if (flashdata) {
            Swal.fire({
                title: 'Data User',
                text: flashdata,
                confirmButtonColor: '#3085d6',
                icon: 'success'
            })

            //tombol hapus
            const allowsubmit = false;
            $('.tombol-hapus').on('click', function(e) {
                e.preventDefault();
                var href = $(this).attr("href");
                console.log(href);
                warningsebelumredirect(href);

                function warningsebelumredirect(href) {

                    Swal.fire({
                        title: 'Apakah Kamu Yakin?',
                        text: "Data User Akan Dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Data!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;

                        }
                    })
                }
            });



        }
    </script>
    <!-- Akhir Sweetalert User -->


    <!-- Sweetalert menu -->

    <script>
        const flashdata_menu = $('.flashdata-menu').data('flashdata');

        if (flashdata_menu) {
            Swal.fire({
                title: 'Data Menu',
                text: flashdata_menu,
                confirmButtonColor: '#3085d6',
                icon: 'success'
            })

            //tombol hapus
            const allowsubmit = false;
            $('.tombol-hapus').on('click', function(e) {
                e.preventDefault();
                var href = $(this).attr("href");
                console.log(href);
                warningsebelumredirect(href);

            });

            function warningsebelumredirect(href) {

                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Data Menu Akan Dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Data!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = href;

                    }
                })
            }


        }
    </script>
    <!-- Akhir Sweetalert menu -->

    <!-- Sweetalert transaksi -->

    <script>
        const flashdata_transaksi = $('.flashdata-transaksi').data('flashdata');

        if (flashdata_transaksi) {
            Swal.fire({
                title: 'Data Transaksi',
                text: flashdata_transaksi,
                confirmButtonColor: '#3085d6',
                icon: 'success'
            })

            //tombol hapus
            const allowsubmit = false;
            $('.tombol-hapus').on('click', function(e) {
                e.preventDefault();
                var href = $(this).attr("href");
                console.log(href);
                warningsebelumredirect(href);

            });

            function warningsebelumredirect(href) {

                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Data Transaksi Akan Dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Data!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = href;

                    }
                })
            }


        }
    </script>
    <!-- Akhir Sweetalert transaksi -->


</body>

</html>
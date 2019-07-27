<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Poling BPS</title>

        <!-- core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">

        <!-- sidebar menu-style --> 
        <link rel="stylesheet" type="text/css" href="css/demo-sidebar.css" />
        <link rel="stylesheet" type="text/css" href="css/icons-sidebar.css" />
        <link rel="stylesheet" type="text/css" href="css/component-sidebar.css" />
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css" />



        <!-- js -->
        <script src="js/modernizr.custom.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/sweetalert.min.js"></script>

        <link href="css/mystyle-default.css" rel="stylesheet">
        <link href="css/mystyle-edit.css" rel="stylesheet">


    </head>

    <body class="latar-abu-terang">
        <div id="st-container" class="st-container">
            <!-- navigasi side bar -->
            <nav class="st-menu st-effect-4" id="menu-4">
                <h2 class="icon icon-tag">MENU</h2>
                <ul>
                    <li><a href="cn_admin.php?id=dashboard"> <span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                    <li><a href="cn_admin.php?id=data_polling"><i class="glyphicon glyphicon-signal"></i> Data Poling</a></li>
                    <li><a href="cn_admin.php?id=background"><span class="glyphicon glyphicon-picture"></span> Background</a></li>
                    <li><a href="cn_admin.php?id=running_text"><span class="glyphicon glyphicon-transfer"></span> Running Text</a></li>
                    <li><a href="cn_admin.php?id=konten_web"><span class="glyphicon glyphicon-bookmark"></span> Konten WEB</a></li>
                </ul>
            </nav>
            <div class="st-pusher">	<!-- content push wrapper -->		
                <div class="st-content"><!-- this is the wrapper for the content -->
                    <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->

                        <!-- navigasi -->
                        <nav class="navbar navbar no-radius no-border latar-hitam-modern" role="navigation">
                            <div class="container-fluid">

                                <!-- button open sidebar -->
                                <div class="col-md-1 col-sm-2 col-xs-5 margin-down-min pull-left">
                                    <div class="col-sm-12 col-xs-12 no-margin no-padding margin-down-min" id="st-trigger-effects">
                                        <button class="tes button-flat" data-effect="st-effect-4" style="margin-top:0px;"><i class="fa fa-tasks"></i></button>
                                    </div>  
                                </div>
                                <div class="col-md-2">
                                    <h4 class="text-putih" style="margin-top:22px">
                                        <?php
                                        setlocale(LC_TIME, 'IND');
                                        echo strftime("%d") . " " . strftime("%B") . " " . strftime("%Y");
                                        ?>
                                    </h4>
                                </div>

                                <div class="col-md-3 pull-right margin-down-min">
                                    <div class="col-md-2 margin-down-min pull-right no-padding">
                                        <a href="" class="no-padding no-margin"><img src="images/logo-bps.png" width="60px"></a>
                                    </div>

                                    <div class="col-md-10 pull-right">
                                        <div class="col-md-12 no-padding">
                                            <h4 class="pull-right text-putih">Badan Pusat Statistik</h4>
                                        </div>
                                        <div class="col-md-12 no-padding">
                                            <p class="text-putih pull-right margin-up-min"><?php echo $lokasi_cetak; ?></p>
                                        </div>
                                    </div>  
                                </div> 
                            </div>
                        </nav>


                        <div class="container-fluid" style="min-height:630px">
                            <div class="col-md-12 space-bottom-mid">
                                <h2 class="text-orange"> <strong>Dashboard</strong> </h2>
                                <h4 class="margin-up-min"> Administrator </h4>
                            </div>


                            <!-- panel background -->
                            <div class="col-md-5">
                                <!-- slide foto pemenang -->
                                <div class="col-md-12 space-bottom-min no-padding">
                                    <div class="panel">

                                        <div class="panel-body no-padding no-margin">
                                            <div class="col-md-12 col-sm-12 no-padding no-margin">
                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">

                                                        <?php
                                                        if ($count_data_background == 0) {
                                                            $data_background_jadi[0] = "Kosong";
                                                            $data_background_jadi[1] = "images/background/template.jpg";
                                                            echo "
                                                                <div class=\"item active\">
                                                                    <img src=\"$data_background_jadi[1]\" width=\"100%\" height=\"350px\">
                                                                    <div class=\"carousel-caption\">
                                                                        <h3 class=\"text-putih pull-left text-shadow\">$data_background_jadi[0]</h3>
                                                                    </div>
                                                                </div>";
                                                        } else {
                                                            $count = 1;
                                                            while ($data_background_jadi = mysqli_fetch_array($data_background)) {
                                                                if ($count == 1) {
                                                                    ?>
                                                                    <div class="item active" style="height:310px">
                                                                        <img src="<?php echo $data_background_jadi[1]; ?>" width="100%" style="height:310px">
                                                                        <div class="carousel-caption">
                                                                            <h3 class="text-putih pull-left text-shadow"><?php echo $data_background_jadi[0]; ?> </h3>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $count = $count + 1;
                                                                } else {
                                                                    ?>
                                                                    <div class="item" style="height:310px">
                                                                        <img src="<?php echo $data_background_jadi[1]; ?>" width="100%" style="height:310px">
                                                                        <div class="carousel-caption">
                                                                            <h3 class="text-putih pull-left text-shadow"><?php echo $data_background_jadi[0]; ?> </h3>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $count = $count + 1;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 panel-footer latar-putih">
                                            <div class="col-md-9 col-sm-9 margin-down-min">
                                                <p>Gambar Backgrund Halaman Polling</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 no-padding">
                                                <a href="cn_admin.php?id=background" class="pull-right"><button class="btn btn-info">Masuk</button></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>  

                            </div>




                            <!-- panel info -->
                            <div class="col-md-7 no-padding space-bottom-min">

                                <!-- info jumlah poling bulan ini -->
                                <!-- tidak puas -->
                                <div class="col-md-4"> 
                                    <div class="col-md-4 latar-merah" style="height:70px">
                                        <h1 class="text-center text-putih text-bold"><?php echo "$data_rekap_jadi[0]"; ?></h1>
                                    </div>
                                    <div class="col-md-8 latar-putih">
                                        <h6 class="text-abu">Jumlah polling untuk kategori</h6>
                                        <h4 class="margin-up-xs text-merah">Tidak Puas</h4>
                                    </div>
                                </div>



                                <!-- puas -->
                                <div class="col-md-4"> 
                                    <div class="col-md-4 latar-biru" style="height:70px">
                                        <h1 class="text-center text-putih text-bold"><?php echo "$data_rekap_jadi[1]"; ?></h1>
                                    </div>
                                    <div class="col-md-8 latar-putih">
                                        <h6 class="text-abu">Jumlah polling untuk kategori</h6>
                                        <h4 class="margin-up-xs text-biru">Puas</h4>
                                    </div>
                                </div>

                                <!-- sangat puas -->
                                <div class="col-md-4  space-bottom-min"> 
                                    <div class="col-md-4 latar-hijau" style="height:70px">
                                        <h1 class="text-center text-putih text-bold"><?php echo "$data_rekap_jadi[2]"; ?></h1>
                                    </div>
                                    <div class="col-md-8 latar-putih">
                                        <h6 class="text-abu">Jumlah polling untuk kategori</h6>
                                        <h4 class="margin-up-xs text-hijau">Sangat Puas</h4>
                                    </div>
                                </div>

                                <!-- data poling -->
                                <div class="col-md-4 space-bottom-min">
                                    <div class="panel">

                                        <div class="panel-body latar-ungu">
                                            <div class="col-md-6 col-sm-6">
                                                <span class="glyphicon glyphicon-signal text-putih font-big margin-down-min"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 no-padding">
                                                <h2 class="text-putih"><?php echo $data_rekap_jadi[0] + $data_rekap_jadi[1] + $data_rekap_jadi[2] . ""; ?></h2>
                                                <p class="text-putih margin-up-min">Data Poling</p>

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 panel-footer latar-putih">
                                            <div class="col-md-9 col-sm-9 col-xs-9 margin-down-min">
                                                <p>Lihat Total Polling Kepuasan</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ">
                                                <a href="cn_admin.php?id=data_polling" class="pull-right"><button class="margin-down-min btn btn-info">Masuk</button></a>
                                            </div>
                                        </div>

                                    </div>

                                </div> 


                                <!-- data running text -->
                                <div class="col-md-4 space-bottom-min">
                                    <div class="panel">

                                        <div class="panel-body latar-biru-tua">
                                            <div class="col-md-6 col-sm-6">
                                                <span class="glyphicon glyphicon-transfer text-putih font-big margin-down-min"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 no-padding">
                                                <h2 class="text-putih"><?php echo "$count_data_running_text"; ?></h2>
                                                <p class="text-putih margin-up-min">Running Text</p>

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 panel-footer latar-putih">
                                            <div class="col-md-9 col-sm-9 col-xs-9 margin-down-min">
                                                <p>Berita pada running text</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding">
                                                <a href="cn_admin.php?id=running_text" class="pull-right"><button class="margin-down-min btn btn-info">Masuk</button></a>
                                            </div>
                                        </div>

                                    </div>

                                </div> 

                                <!-- konten web -->
                                <div class="col-md-4 space-bottom-min">
                                    <div class="panel">

                                        <div class="panel-body latar-orange">
                                            <div class="col-md-6 col-sm-6">
                                                <span class="glyphicon glyphicon-bookmark text-putih font-big margin-down-min"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 no-padding">
                                                <h2 class="text-putih"><?php echo "4"; ?></h2>
                                                <p class="text-putih margin-up-min">Konten Web</p>

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 panel-footer latar-putih">
                                            <div class="col-md-9 col-sm-9 col-xs-9 margin-down-min">
                                                <p>Ubah Header, Footer dll.</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding">
                                                <a href="cn_admin.php?id=konten_web" class="margin-down-min pull-right"><button class="btn btn-info">Masuk</button></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <a href="cn_pengunjung.php" target="_blank"><button class="btn-full-width btn btn-primary btn-lg">Aktifkan Halaman Polling</button></a>
                                </div>
                            </div>			
                        </div>





                       













                    </div> <!-- pusher -->
                </div> <!--content-inner st-sidebar -->
            </div> <!--content st-sidebar -->
        </div> <!--container st-sidebar -->


        <script src="js/classie.js"></script>
        <script src="js/sidebarEffects.js"></script>

    </body>
</html>
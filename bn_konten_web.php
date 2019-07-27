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

    <body class="latar-putih">
        <div id="st-container" class="st-container">
            <!-- navigasi side bar -->
            <nav class="st-menu st-effect-4" id="menu-4">
                <h2 class="icon icon-tag">Menu</h2>
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


                        <div class="container-fluid">
                            <div class="col-md-12 space-bottom-min">
                                <h2 class="text-orange"> <strong>Konten WEB</strong> </h2>
                                <h4 class="margin-up-min"> Edit konten Web seperti Header, Footer dll. </h4>
                            </div>


                            <div class="row space-top latar-putih">


                                <div class="col-md-12 space-bottom-mid">

                                    <div class="col-md-12 space-top-min">
                                        <img src="images/konten_web/halaman-poling.jpg" height="300px" width="100%">   
                                    </div>

                                    <div class="col-md-12 space-top-min">
                                        <hr class="latar-abu-gelap">
                                        <div class="col-md-4 latar-putih col-md-push-4" style="margin-top:-30px">
                                            <p class="text-abu-gelap text-center">Scroll ke bawah untuk edit konten</p>
                                        </div>
                                    </div>

                                    <!-- lokasi BPS -->
                                    <div class="col-md-3 space-top-min">
                                        <!-- image konten -->
                                        <div class="col-md-12 no-pad">
                                            <img src="images/konten_web/lokasi-BPS.jpg" width="100%"  style="height:150px">
                                        </div>
                                        <!-- text konten -->
                                        <div class="col-md-12 latar-abu-gelap">
                                            <div class="col-md-8 space-top-xs space-bottom-xs">
                                                <h4 class="text-putih">Lokasi Badan Pusat Statistik</h4>                      
                                            </div>
                                            <div class="col-md-4 space-bottom-xs" style="margin-top:20px">
                                                <button class="btn btn-info pull-right" data-toggle="modal" data-target="#edit_lokasi">Edit</button>                      
                                            </div>
                                        </div>
                                    </div>

                                    <!-- judul halaman poling -->
                                    <div class="col-md-3 space-top-min">
                                        <!-- image konten -->
                                        <div class="col-md-12 no-pad">
                                            <img src="images/konten_web/judul.jpg" width="100%"  style="height:150px">
                                        </div>
                                        <!-- text konten -->
                                        <div class="col-md-12 latar-abu-gelap">
                                            <div class="col-md-8 space-top-xs space-bottom-xs">
                                                <h4 class="text-putih">Judul Hamalan Polling</h4>                      
                                            </div>
                                            <div class="col-md-4 space-bottom-xs" style="margin-top:20px">
                                                <button class="btn btn-info pull-right"  data-toggle="modal" data-target="#edit_judul">Edit</button>                      
                                            </div>
                                        </div>
                                    </div>

                                    <!-- side bar sub judul poling -->
                                    <div class="col-md-3 space-top-min">
                                        <!-- image konten -->
                                        <div class="col-md-12 no-pad">
                                            <img src="images/konten_web/sidebar_subjudul.jpg" width="100%"  style="height:150px">
                                        </div>
                                        <!-- text konten -->
                                        <div class="col-md-12 latar-abu-gelap">
                                            <div class="col-md-8 space-top-xs space-bottom-xs">
                                                <h4 class="text-putih">Sidebar - Sub Judul</h4>                      
                                            </div>
                                            <div class="col-md-4 space-bottom-xs" style="margin-top:20px">
                                                <button class="btn btn-info pull-right"  data-toggle="modal" data-target="#edit_subjudul">Edit</button>                      
                                            </div>
                                        </div>
                                    </div>

                                    <!-- side bar indikator poling -->
                                    <div class="col-md-3 space-top-min">
                                        <!-- image konten -->
                                        <div class="col-md-12 no-pad">
                                            <img src="images/konten_web/sidebar_indikator.jpg" width="100%"  style="height:150px">
                                        </div>
                                        <!-- text konten -->
                                        <div class="col-md-12 latar-abu-gelap">
                                            <div class="col-md-8 space-top-xs space-bottom-xs">
                                                <h4 class="text-putih">Sidebar - Text Indikator</h4>                      
                                            </div>
                                            <div class="col-md-4 space-bottom-xs" style="margin-top:20px">
                                                <button class="btn btn-info pull-right"  data-toggle="modal" data-target="#edit_indikator">Edit</button>                      
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>








                        </div>





                        <!-- <div class="fix-bottom latar-putih">
                                <div class="container-fluid">
                                        
                                
                                <div class="col-md-3">
                                    <img src="images/logo-bps.png" width="30px" style="margin-right:6px"> 
                                    <img src="images/ub.png" width="25px" style="margin-right:7px">
                                    <img src="images/filkom.png" width="60px" style="margin-right:10px"> 
                                </div>
                        
                                <div class="col-md-4 col-md-push-1">
                                    <h6 class="text-center">Sistem Poling Badan Pusat Statistik</h6>
                                </div>
                        
                                <div class="col-md-3 pull-right">
                                    <h6 class="text-hitam-modern pull-right">copyright  &copy 2015</h6>
                                </div>  
                        
                                </div>
                        </div> -->


                    </div> <!-- pusher -->
                </div> <!--content-inner st-sidebar -->
            </div> <!--content st-sidebar -->
        </div> <!--container st-sidebar -->


        <script src="js/classie.js"></script>
        <script src="js/sidebarEffects.js"></script>



        <!-- js -->
        <script>
            $(function () {
                if (window.location == window.parent.location) {
                    $('#fullscreen').html('<span class="glyphicon glyphicon-resize-small"></span>');
                    $('#fullscreen').attr('href', 'http://bootsnipp.com/mouse0270/snippets/rgNez');
                    $('#fullscreen').attr('title', 'Back To Bootsnipp');
                }
                $('#fullscreen').on('click', function (event) {
                    event.preventDefault();
                    window.parent.location = $('#fullscreen').attr('href');
                });
                $('#fullscreen').tooltip();
            });
            /* END DEMO OF JS - THAT IS RIGHT NO ADDITONAL JAVASCRIPT NEEDED FOR THIS SNIPPET */
        </script>



        <!-- modal edit lokasi bps -->

        <div class="modal fade in slacker-modal" id="edit_lokasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-slacker">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Lokasi BPS</h4>
                    </div>
                    <div class="modal-body">
                        <form action="cn_admin.php" method="POST">  
                            <p class="form-inner text-orange">Masukan Lokasi</p>
                            <input name="lokasi" class="form-control" style="padding-left:120px; height:40px" value="<?php echo $datakonten_lokasi_jadi; ?>" required>
                            <button type="submit" name="btn_tambah_kw_l" class="space-top-min pull-right btn btn-primary"> Simpan <span class="glyphicon glyphicon-save"></span> </button>
                        </form> 
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>



        <!-- modal edit judul halaman polling -->

        <div class="modal fade in slacker-modal" id="edit_judul" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-slacker">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Judul Polling</h4>
                    </div>
                    <div class="modal-body">
                        <form action="cn_admin.php" method="POST">  
                            <p class="form-inner text-orange">Masukan Judul</p>
                            <input name="judul" class="form-control" style="padding-left:120px; height:40px" value="<?php echo $datakonten_judul_jadi; ?>" required>
                            <button type="submit" name="btn_tambah_kw_j" class="space-top-min pull-right btn btn-primary"> Simpan <span class="glyphicon glyphicon-save"></span> </button>
                        </form> 
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>




        <!-- modal edit subjudul -->

        <div class="modal fade in slacker-modal" id="edit_subjudul" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-slacker">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Sub Judul Polling</h4>
                    </div>
                    <div class="modal-body">
                        <form action="cn_admin.php" method="POST"> 
                            <p class="form-inner text-orange">Masukan Text</p>
                            <textarea name="subjudul" class="form-control" style="padding-left:110px; height:210px" maxlength="500" required><?php echo $datakonten_subjudul_jadi; ?></textarea>
                            <h6>Batas panjang karakter = 500 karakter</h6>
                            <button type="submit" name="btn_tambah_kw_sj" class="pull-right btn btn-primary"> Tambah <span class="glyphicon glyphicon-save"></span> </button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <!-- modal edit indikator -->

        <div class="modal fade in slacker-modal" id="edit_indikator" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-slacker">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Text Indikator</h4>
                    </div>
                    <div class="modal-body">
                        <form action="cn_admin.php" method="POST"> 
                            <p class="form-inner text-orange">Masukan Text</p>
                            <textarea name="indikator" class="form-control" style="padding-left:110px; height:210px" maxlength="500" required><?php echo $datakonten_indikator_jadi; ?></textarea>
                            <h6>Batas panjang karakter = 500 karakter</h6>
                            <button type="submit" name="btn_tambah_kw_idk" class="pull-right btn btn-primary"> Tambah <span class="glyphicon glyphicon-save"></span> </button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


    </body>
</html>
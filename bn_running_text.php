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
                            <div class="col-md-12 space-bottom-mid">
                                <h2 class="text-orange"> <strong>Running Text</strong> </h2>
                                <h4 class="margin-up-min"> Text berjalan pada Halaman Poling Pengunjung </h4>
                            </div>


                            <div class="row space-top latar-putih" style="min-height:500px">
                                <div class="col-md-10 col-md-push-1">

                                    <!-- cek database running-text -->

                                    <?php
                                    if ($count_data_running_text == 0) {
                                        ?>
                                        <!-- tidak ada data -->
                                        <p class="text-center space-top-min">Tidak ditemukan running text apapun</p>

                                        <div class="col-md-4 col-md-push-4 space-bottom text-center">
                                            <button class="text-center btn btn-full-width btn-bg btn-info" data-toggle="modal" data-target="#tambah"><span class="glyphicon glyphicon-transfer"></span> Tambah Running Text</button>
                                        </div>

                                    <?php } else { ?>

                                        <div class="col-md-2 pull-right no-padding">
                                            <button class="text-center btn btn-btn-full-width btn-bg btn-info space-bottom-min" data-toggle="modal" data-target="#tambah"><span class="glyphicon glyphicon-transfer"></span> Tambah Running Text</button> 
                                        </div>


                                        <div class="table table-list-search table-responsive space-bottom padding-bottom">
                                            <table id="pagination" class="table table-bordred table-striped" >

                                                <thead>
                                                <th>No</th>
                                                <th>Running Text</th>
                                                <th width="200px" class="text-center">Tanggal Modifikasi</th>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    while ($data_running_text_jadi = mysqli_fetch_array($data_running_text)) {
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $data_running_text_jadi[0]; ?></td>
                                                            <td class="text-center"><?php echo $data_running_text_jadi[1]; ?></td>


                                                            <!-- button edit -->
                                                            <td>
                                                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?php echo $data_running_text_jadi[2]; ?>" data-placement="top">
                                                                    <i class="fa fa-edit"></i> Edit</button>
                                                            </td>

                                                            <!-- button hapus -->
                                                            <td>
                                                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $data_running_text_jadi[2]; ?>" data-placement="top">
                                                                    <span class="glyphicon glyphicon-trash"></span> Hapus</button>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    <?php } ?>
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






        <!-- modal hover tambah running text -->

        <div class="modal fade in slacker-modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-slacker">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Runing Text</h4>
                    </div>
                    <div class="modal-body">
                        <form action="cn_admin.php" method="POST"> 
                            <p class="form-inner text-orange">Masukan Text</p>
                            <textarea name="informasi" class="form-control" style="padding-left:110px; height:210px" maxlength="500" required></textarea>
                            <h6>Batas panjang karakter = 500 karakter</h6>
                            <button type="submit" name="btn_tambah_rt" class="pull-right btn btn-primary"> Tambah <span class="glyphicon glyphicon-save"></span> </button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>






        <!-- php untuk penomoran modal -->
        <?php
        if ($count_data_running_text_modal > 0) {
            while ($data_running_text_modal_jadi = mysqli_fetch_array($data_running_text_modal)) {
                ?>
                <!-- modal hover edit running text -->
                <div class="modal fade in slacker-modal" id="edit<?php echo $data_running_text_modal_jadi[2]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                    <div class="modal-dialog modal-slacker">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myLargeModalLabel">Edit Runing Text</h4>
                            </div>
                            <div class="modal-body">
                                <form action="cn_admin.php" method="POST">
                                    <p class="form-inner text-orange">Masukan Text</p>
                                    <textarea name="informasi" class="form-control" style="padding-left:110px; height:210px" maxlength="500" required><?php echo $data_running_text_modal_jadi[0]; ?> </textarea>
                                    <h6>Batas panjang karakter = 500 karakter</h6>

                                    <input type="hidden" name="id" value="<?php echo $data_running_text_modal_jadi[2]; ?>">
                                    <button type="submit" name="btn_simpan_edit_rt" class="pull-right btn btn-primary"> Simpan <span class="glyphicon glyphicon-save"></span> </button>
                                </form>
                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="hapus<?php echo $data_running_text_modal_jadi[2]; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title custom_align" id="Heading">Hapus Running Text</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Anda yakin akan menghapus runing text ini?</div>
                            </div>
                            <div class="modal-footer ">
                                <form action="cn_admin.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $data_running_text_modal_jadi[2]; ?>">
                                    <button name="btn_hapus_rt" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>
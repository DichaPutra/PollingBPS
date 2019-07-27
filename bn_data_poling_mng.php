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
                            <div class="col-md-12 margin-up-min space-bottom-min">
                                <h2 class="text-orange"> <strong>Manage Data Polling</strong> </h2>
                                <h4 class="margin-up-min"> Tambah, Edit dan Hapus Polling  </h4>
                                <!-- back button -->
                                <div class="col-md-3 no-pad">
                                    <a href="cn_admin.php?id=data_polling" class="btn btn-primary btn-md" style="width:150px"><span class="glyphicon glyphicon-circle-arrow-left"></span> Kembali</a>                                   
                                </div>
                                <h3 class="pull-right margin-up text-hijau">
                                    <?php
                                    $exp = explode(" ", $date_get);

                                    $month_ina = "";
                                    switch ($exp[1]) {
                                        case "January":$month_ina = "Januari";
                                            break;
                                        case "February": $month_ina = "Februari";
                                            break;
                                        case "March":$month_ina = "Maret";
                                            break;
                                        case "April":$month_ina = "April";
                                            break;
                                        case "May": $month_ina = "Mei";
                                            break;
                                        case "June": $month_ina = "Juni";
                                            break;
                                        case "July": $month_ina = "Juli";
                                            break;
                                        case "August": $month_ina = "Agustus";
                                            break;
                                        case "September": $month_ina = "September";
                                            break;
                                        case "October": $month_ina = "Oktober";
                                            break;
                                        case "November": $month_ina = "November";
                                            break;
                                        case "December": $month_ina = "Desember";
                                            break;
                                    }

                                    echo "Tanggal terpilih " . $exp[0] . " " . $month_ina . " " . $exp[2];
                                    ?>
                                </h3>
                            </div>


                            <div class="row space-top latar-putih" style="min-height:500px">
                                <div class="col-md-12">

                                    <div class="col-md-4 sidebar-fix">
                                        <div class="col-md-12">
                                            <h4>Total Poling</h4>                    
                                        </div>

                                        <div class="col-md-12">
                                            <p>Sangat Puas</p>
                                            <h1 class="text-hijau text-bold margin-up-min"><?php echo $p_sp; ?></h1>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Puas</p>
                                            <h1 class="text-kuning text-bold margin-up-min"><?php echo $p_p; ?></h1>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Tidak Puas</p>
                                            <h1 class="text-merah text-bold margin-up-min"><?php echo $p_tp; ?></h1>
                                        </div>

                                        <div class="col-md-12 space-top-min">
                                            <p>Jumlah</p>
                                            <h1 class="text-biru-tua text-bold margin-up-min"><?php echo $p_tot; ?></h1>
                                        </div>

                                    </div>



                                    <!-- judul tabel rekap -->                                     
                                    <div class="col-md-8 col-md-push-3">

                                        <div class="col-md-6 no-padding">
                                            <h4>Tabel Rekap Poling</h4>
                                        </div>
                                        <div class="col-md-4 pull-right no-pad">
                                            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#tambah"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
                                        </div>

                                        <!-- table rekap -->
                                        <div class="table table-list-search table-responsive space-bottom">
                                            <table id="pagination" class="table table-bordred table-striped" >

                                                <thead>

                                                <th class="text-center">No</th>
                                                <th class="text-center">Waktu</th>
                                                <th class="text-center">Pendapat Pelanggan</th>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    if (mysqli_num_rows($detil) != 0) {

                                                        while ($result = mysqli_fetch_array($detil)) {
                                                            $no++;
                                                            ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no; ?></td>
                                                                <td class="text-center">
                                                                    <?php
                                                                    $exp1 = explode(" ", $result[1]);
                                                                    echo $exp1[1];
                                                                    ?>
                                                                </td>
                                                                <?php
                                                                if ($result[2] == 'tidak puas') {
                                                                    ?>
                                                                    <td class="text-center"><span style="font-size: 15px" class="label label-danger text-capitalize"><?php echo $result[2]; ?></span></td>
                                                                    <?php
                                                                } elseif ($result[2] == 'puas') {
                                                                    ?>
                                                                    <td class="text-center"><span style="font-size: 15px" class="label label-warning text-capitalize"><?php echo $result[2]; ?></span></td>
                                                                    <?php
                                                                } elseif ($result[2] == 'sangat puas') {
                                                                    ?>
                                                                    <td class="text-center"><span style="font-size: 15px" class="label label-success text-capitalize"><?php echo $result[2]; ?></span></td>
                                                                    <?php
                                                                }
                                                                ?>

                                                                <!-- button edit -->
                                                                <td class=" text-right">
                                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $no; ?>" data-placement="top">
                                                                        <i class="fa fa-edit"></i> Edit</button>
                                                                </td>

                                                                <!-- button hapus -->
                                                                <td class="text-right">
                                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $no; ?>" data-placement="top">
                                                                        <span class="glyphicon glyphicon-trash"></span> Hapus</button>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>                      
                                    </div>        
                                </div>        
                            </div>
                        </div>





<!--                        <div class="fix-bottom latar-putih">
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
                        </div>-->













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



        <!-- modal hover tambah polling -->

        <div class="modal fade in slacker-modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-slacker">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Polling</h4>
                    </div>
                    <div class="modal-body">
                        <form action="cn_admin.php" method="POST">  
                            <div class="col-md-6 no-pad">
                                <p class="form-inner text-orange">Pilih Waktu</p>
                                <input type="time" name="time" class="form-control" style="padding-left:120px; height:40px" required>
                            </div>
                            <div class="col-md-6 no-pad space-bottom-xs">
                                <p class="form-inner text-orange">Pilih Pendapat</p>
                                <select name="polling" class="form-control" style="padding-left:120px; height:40px">
                                    <option value="sangat puas">Sangat Puas</option>
                                    <option value="puas">Puas</option>
                                    <option value="tidak puas">Tidak Puas</option>
                                </select>
                            </div>
                            <input type="hidden" name="tanggal" value="<?php echo $date_rekap; ?>">
                            <p>Data akan ditambahkan pada tanggal <?php echo "Tanggal terpilih " . $exp[0] . " " . $month_ina . " " . $exp[2]; ?></p>
                            <button type="submit" name="btn_mdp_tambah" class="pull-right btn btn-primary"> Tambah <span class="glyphicon glyphicon-save"></span> </button>
                        </form> 
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>




        <!-- modal hover tambah polling -->
        <?php
        $no = 0;
        if (mysqli_num_rows($detil_modal) != 0) {
            while ($result_modal = mysqli_fetch_array($detil_modal)) {
                $no++;
                ?>
                <div class="modal fade in slacker-modal" id="edit<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                    <div class="modal-dialog modal-slacker">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myLargeModalLabel">Edit Data Polling</h4>
                            </div>
                            <div class="modal-body">
                                <form action="cn_admin.php" method="POST">  
                                    <div class="col-md-6 no-pad">
                                        <p class="form-inner text-orange">Pilih Waktu</p>
                                        <input type="time" name="time" class="form-control" style="padding-left:120px; height:40px" value="12:20 AM" maxlength= required>
                                    </div>
                                    <div class="col-md-6 no-pad space-bottom-xs">
                                        <p class="form-inner text-orange">Pilih Pendapat</p>
                                        <select name="polling" class="form-control" style="padding-left:120px; height:40px">
                                            <option value="sangat puas">Sangat Puas</option>
                                            <option value="puas">Puas</option>
                                            <option value="tidak puas">Tidak Puas</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="idpolling" value="<?php echo $result_modal[0]; ?>">
                                    <input type="hidden" name="tanggal" value="<?php echo $date_rekap; ?>">
                                    <input type="hidden" name="lastpolling" value="<?php echo $result_modal[2]; ?>">

                                    <p>Data akan ditambahkan pada tanggal <?php echo "Tanggal terpilih " . $exp[0] . " " . $month_ina . " " . $exp[2]; ?></p>
                                    <button type="submit" name="btn_mdp_edit" class="pull-right btn btn-warning"> Simpan <span class="glyphicon glyphicon-save"></span> </button>
                                </form> 
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


                <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title custom_align" id="Heading">Hapus Data Polling</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Anda yakin akan menghapus data polling ini?</div>
                            </div>
                            <div class="modal-footer ">
                                <form action="cn_admin.php" method="POST"> 
                                    <input type="hidden" name="idpolling" value="<?php echo $result_modal[0]; ?>">
                                    <input type="hidden" name="tanggal" value="<?php echo $date_rekap; ?>">
                                    <input type="hidden" name="polling" value="<?php echo $result_modal[2]; ?>">
                                    <button name="btn_mdp_hapus" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-ok-sign"></span> Ya!</button>
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
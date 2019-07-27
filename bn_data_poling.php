<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="google-site-verification" content="VqN13JOyGCOXRTR_V_vB4giEsK0Oebi2oZ4sUWwiywI" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Poling BPS</title>

        <!-- core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/font-awesome.css" rel="stylesheet">

                <!-- sidebar menu-style --> 
                <link rel="stylesheet" type="text/css" href="css/demo-sidebar.css" />
                <link rel="stylesheet" type="text/css" href="css/icons-sidebar.css" />
                <link rel="stylesheet" type="text/css" href="css/component-sidebar.css" />
                <link rel="stylesheet" type="text/css" href="css/tablepaginaation.css" />



                <!-- js -->
                <!-- // <script src="js/modernizr.custom.js"></script> -->
                <!-- // <script src="js/ajax.js"></script> -->
                <script src="js/jquery.new.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/canvasjs.js"></script>

                <link href="css/mystyle-default.css" rel="stylesheet">
                    <link href="css/mystyle-edit.css" rel="stylesheet">


                        </head>

                        <body class="latar-hitam-modern">
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
                                                    <h2 class="text-orange"> <strong>Data polling</strong> </h2>
                                                    <h4 class="margin-up-min"> Semua data polling kepuasan pelanggan </h4>
                                                </div>


                                                <div class="row space-top latar-putih">
                                                    <div class="col-md-10 col-md-push-1">

                                                        <!-- cek database running-text -->

                                                        <?php
                                                        if ($count_data_polling_tahunan == 0) {
                                                            ?>
                                                            <!-- tidak ada data -->
                                                            <p class="text-center space-top space-bottom">Tidak ditemukan data apapun</p>

                                                        <?php } else { ?>

                                                            <div class="col-md-12 no-padding">

                                                                <!-- judul grafik -->
                                                                <div class="col-md-12">
                                                                    <div class="col-md-5">
                                                                        <h4>Grafik Poling Tahun <?php echo $tahun_grafik; ?></h4>
                                                                    </div>

                                                                    <!-- form search -->
                                                                    <form action="cn_admin.php" method="POST">
                                                                        <div class="col-md-1 no-padding pull-right">
                                                                            <button name="btn_search_grafik" type="submit" class="btn btn-full-width btn-info" style="margin-left:-5px"><span class="glyphicon glyphicon-search"></span>  Search</button>
                                                                        </div>

                                                                        <div class="col-md-2 no-padding pull-right">
                                                                            <select class="form-control" name="selection_1">
                                                                                <?php if ($count_tahun_exist_grafik == 0) { ?>
                                                                                    <option>tahun</option>    
                                                                                    <?php
                                                                                } else {
                                                                                    $ttt = "";
                                                                                    while ($tahun_exist_grafik_jadi = mysqli_fetch_array($tahun_exist_grafik)) {
                                                                                        if ($tahun_exist_grafik_jadi[0] == $tahun_grafik) {
                                                                                            $ttt = "selected";
                                                                                        } else {
                                                                                            $ttt = "";
                                                                                        }
                                                                                        ?>        
                                                                                        <option <?php echo $ttt; ?>><?php echo $tahun_exist_grafik_jadi[0]; ?></option>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 no-padding">
                                                                <!-- grafik -->
                                                                <div id="charttahun" style="height: 300px; width: 100%;">
                                                                </div>
                                                            </div>

                                                            <!-- judul tabel rekap -->
                                                            <div class="col-md-12 space-top-mid space-bttom">
                                                                <div class="col-md-7 no-pad space-bottom-min">
                                                                    <div class="col-md-6 no-padding">
                                                                        <h4>Grafik Poling Bulan <?php echo $bulan_tabel ?>  </h4>
                                                                    </div>
                                                                    <div class="col-md-2 no-padding">
                                                                        <form action="cn_admin.php" method="POST">
                                                                            <button type="submit" name="btn_simpan_excel" class="pull-left btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-saved"></span> Excel</button>
                                                                            <input type="hidden" name="tahun_simpan" value="<?php echo $tahun_grafik; ?>"></input>
                                                                            <input type="hidden" name="bulan_simpan" value="<?php echo $bulan_tabel; ?>"></input>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-md-1 ">

                                                                        <form action="bn_pdf.php" method="POST" target="_blank">
                                                                            <button type="submit" name="btn_simpan_pdf" class="pull-right btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-saved"></span> PDF</button>
                                                                            <input type="hidden" name="tahun_simpan" value="<?php echo $tahun_grafik; ?>"></input>
                                                                            <input type="hidden" name="bulan_simpan" value="<?php echo $bulan_tabel; ?>"></input>
                                                                        </form>


                                                                    </div>
                                                                </div>



                                                                <!-- form search -->
                                                                <form action="cn_admin.php" method="POST">
                                                                    <div class="col-md-1 no-padding pull-right">
                                                                        <button name="btn_search_tabel" type="submit" class="btn btn-full-width btn-info" style="margin-left:-5px"><span class="glyphicon glyphicon-search"></span>  Search</button>
                                                                    </div>

                                                                    <div class="col-md-1 no-padding pull-right">
                                                                        <select class="form-control" name="selection_2">
                                                                            <?php if ($count_tahun_exist_bulan == 0) { ?>
                                                                                <option>tahun</option>    
                                                                                <?php
                                                                            } else {
                                                                                $tt = "";
                                                                                while ($tahun_exist_bulan_jadi = mysqli_fetch_array($tahun_exist_bulan)) {
                                                                                    if ($tahun_exist_bulan_jadi[0] == $tahun_grafik) {
                                                                                        $tt = "selected";
                                                                                    } else {
                                                                                        $tt = "";
                                                                                    }
                                                                                    ?>
                                                                                    <option <?php echo $tt; ?>><?php echo $tahun_exist_bulan_jadi[0] ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-2 no-padding pull-right">
                                                                        <select class="form-control" name="selection_3">
                                                                            <?php
                                                                            $t1 = $t2 = $t3 = $t4 = $t5 = $t6 = $t7 = $t8 = $t9 = $t10 = $t11 = $t12 = "";
                                                                            switch ($bulan_tabel) {
                                                                                case "January": $t1 = "selected";
                                                                                    break;
                                                                                case "February": $t2 = "selected";
                                                                                    break;
                                                                                case "March": $t3 = "selected";
                                                                                    break;
                                                                                case "April": $t4 = "selected";
                                                                                    break;
                                                                                case "May": $t5 = "selected";
                                                                                    break;
                                                                                case "June": $t6 = "selected";
                                                                                    break;
                                                                                case "July": $t7 = "selected";
                                                                                    break;
                                                                                case "August": $t8 = "selected";
                                                                                    break;
                                                                                case "September": $t9 = "selected";
                                                                                    break;
                                                                                case "October": $t10 = "selected";
                                                                                    break;
                                                                                case "November": $t11 = "selected";
                                                                                    break;
                                                                                case "December": $t12 = "selected";
                                                                                    break;
                                                                            }
                                                                            ?>
                                                                            <option value="January" <?php echo $t1; ?>>Januari</option>
                                                                            <option value="February" <?php echo $t2; ?>>Februari</option>
                                                                            <option value="March" <?php echo $t3; ?>>Maret</option>
                                                                            <option value="April" <?php echo $t4; ?>>April</option>
                                                                            <option value="May" <?php echo $t5; ?>>Mei</option>
                                                                            <option value="June" <?php echo $t6; ?>>Juni</option>
                                                                            <option value="July" <?php echo $t7; ?>>Juli</option>
                                                                            <option value="August" <?php echo $t8; ?>>Agustus</option>
                                                                            <option value="September" <?php echo $t9; ?>>September</option>
                                                                            <option value="October" <?php echo $t10; ?>>Oktober</option>
                                                                            <option value="November" <?php echo $t11; ?>>November</option>
                                                                            <option value="December" <?php echo $t12; ?>>Desember</option>
                                                                        </select>
                                                                    </div>
                                                                </form>

                                                            </div>

                                                            <!-- grafik bulan -->
                                                            <div class="col-md-12">
                                                                <div id="chartbulan" style="height: 200px; width: 100%;">
                                                                </div>
                                                            </div>



                                                            <!-- table rekap -->
                                                            <div class="col-md-12">
                                                                <h4>Tabel Rekap Poling Bulan <?php echo $bulan_tabel ?>  </h4>
                                                            </div>
                                                            <div class="table table-list-search table-responsive space-bottom">


                                                                <table id="pagination" class="table table-bordred table-striped" >

                                                                    <thead>

                                                                        <th class="text-center">Tanggal</th>
                                                                        <th class="text-center">Bulan</th>
                                                                        <th class="text-center">Tahun</th>
                                                                        <th class="text-center">Tidak Puas</th>
                                                                        <th class="text-center">Puas</th>
                                                                        <th class="text-center">Sangat Puas</th>
                                                                        <th class="text-center">Total</th>
                                                                        <th class="text-center"></th>

                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $max_date = 0;
                                                                        switch ($bulan) {
                                                                            case "1": $max_date = 31;
                                                                                break;
                                                                            case "2":
                                                                                $kabisat = ($tahun_grafik % 4 == 0) ? "True" : "False";
                                                                                if ($kabisat == "True") {
                                                                                    $max_date = 29;
                                                                                } else {
                                                                                    $max_date = 28;
                                                                                }
                                                                                break;
                                                                            case "3":$max_date = 31;
                                                                                break;
                                                                            case "4":$max_date = 30;
                                                                                break;
                                                                            case "5":$max_date = 31;
                                                                                break;
                                                                            case "6":$max_date = 30;
                                                                                break;
                                                                            case "7":$max_date = 31;
                                                                                break;
                                                                            case "8":$max_date = 31;
                                                                                break;
                                                                            case "9":$max_date = 30;
                                                                                break;
                                                                            case "10":$max_date = 31;
                                                                                break;
                                                                            case "11":$max_date = 30;
                                                                                break;
                                                                            case "12":$max_date = 31;
                                                                                break;
                                                                        }
                                                                        $tanggal = 0;
                                                                        for ($i = 0; $i < $max_date; $i++) {
                                                                            $tanggal++;
                                                                            ?>
                                                                            <tr>
                                                                                <td class="text-center"><?php echo $tanggal; ?></td>
                                                                                <td class="text-center"><?php echo $bulan_tabel; ?></td>
                                                                                <td class="text-center"><?php echo $tahun_grafik; ?></td>
                                                                                <?php
                                                                                if ($data_polling_bulanan_jadi[0] == $tanggal) {
                                                                                    echo "<td class=\"text-center\">$data_polling_bulanan_jadi[3]</td>
                                                                                        <td class=\"text-center\">$data_polling_bulanan_jadi[4]</td>
                                                                                        <td class=\"text-center\">$data_polling_bulanan_jadi[5]</td>";
                                                                                } else {
                                                                                    echo "<td class=\"text-center\">-</td>
                                                                                        <td class=\"text-center\">-</td>
                                                                                        <td class=\"text-center\">-</td>"

                                                                                    ;
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                                if ($data_polling_bulanan_jadi[0] == $tanggal) {
                                                                                    ?>
                                                                                    <td class="text-center"><?php echo $data_polling_bulanan_jadi[3] + $data_polling_bulanan_jadi[4] + $data_polling_bulanan_jadi[5]; ?></td>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <td class="text-center">-</td>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <td class="text-center">
                                                                                    <form action="cn_admin.php" method="POST">
                                                                                        <?php
                                                                                        if ($data_polling_bulanan_jadi[0] == $tanggal) {
                                                                                            ?>
                                                                                            <input type="hidden" name="date_detil" value="<?php echo $data_polling_bulanan_jadi[2] . "-" . $data_polling_bulanan_jadi[1] . "-" . $data_polling_bulanan_jadi[0] ?>"></input>
                                                                                            <input type="hidden" name="p_tp" value="<?php echo $data_polling_bulanan_jadi[3]; ?>"></input>                                                                                            
                                                                                            <input type="hidden" name="p_p" value="<?php echo $data_polling_bulanan_jadi[4]; ?>"></input>                                                                                            
                                                                                            <input type="hidden" name="p_sp" value="<?php echo $data_polling_bulanan_jadi[5]; ?>"></input>                                                                                            
                                                                                            <input type="hidden" name="p_tot" value="<?php echo $data_polling_bulanan_jadi[3] + $data_polling_bulanan_jadi[4] + $data_polling_bulanan_jadi[5]; ?>"></input> 
                                                                                            <?php
                                                                                        } else {
                                                                                            ?>
                                                                                            <input type="hidden" name="date_detil" value="<?php echo $data_polling_bulanan_jadi[2] . "-" . $data_polling_bulanan_jadi[1] . "-" . $tanggal ?>"></input>                                                                                            
                                                                                            <input type="hidden" name="p_tp" value="0"></input>                                                                                            
                                                                                            <input type="hidden" name="p_p" value="0"></input>                                                                                            
                                                                                            <input type="hidden" name="p_sp" value="0"></input>                                                                                            
                                                                                            <input type="hidden" name="p_tot" value="0"></input> 
                                                                                            <?php
                                                                                        }
                                                                                        ?>


                                                                                        <button type="submit" name="btn_detil_poling" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Detail</button>
                                                                                        <?php
                                                                                        if ($data_polling_bulanan_jadi[0] == $tanggal) {
                                                                                            $data_polling_bulanan_jadi = mysqli_fetch_array($data_polling_bulanan);
                                                                                        }
                                                                                        ?>
                                                                                    </form>
                                                                                </td>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        <?php } ?>
                                                    </div>          
                                                </div>
                                            </div>
                                        </div> <!-- pusher -->
                                    </div> <!--content-inner st-sidebar -->
                                </div> <!--content st-sidebar -->
                            </div> <!--container st-sidebar -->


                            <script src="js/classie.js"></script>
                            <script src="js/sidebarEffects.js"></script>


                            <!-- script grafik -->
                            <script type="text/javascript">
                                window.onload = function () {
                                    CanvasJS.addColorSet("mycolor",
                                            [//colorSet Array
                                                "#00db1a",
                                                "#ffce0a",
                                                "#db0000"
                                            ]);
                                    var chartbulan = new CanvasJS.Chart("chartbulan", {
                                        colorSet: "mycolor",
                                        backgroundColor: null,
                                        animationEnabled: true,
                                        axisY2: {
                                            maximum: 100,
                                            interval: 20,
                                            labelFontSize: 20,
                                            labelFontWeight: 500,
                                            suffix: "%",
                                            toolTipContent: "{y} (#percent%)",
                                            labelFontColor: "#212121",
                                            lineColor: "#212121",
                                            gridColor: "#858585",
                                            gridDashType: "dash"
                                        },
                                        axisX: {
                                            interval: 1,
                                            gridThickness: 0,
                                            labelFontSize: 10,
                                            labelFontStyle: "normal",
                                            labelFontWeight: "normal",
                                            labelFontFamily: "Lucida Sans Unicode",
                                            lineColor: "#212121",
                                            tickLength: 0
                                        },
                                        data: [
                                            {
                                                toolTipContent: "{y}%",
                                                indexLabelFontSize: 25,
                                                indexLabelPlacement: "outside",
                                                indexLabelFontColor: "#212121",
                                                indexLabelFontWeight: 500,
                                                indexLabelFontFamily: "Verdana",
                                                type: "bar",
                                                name: "Sangat Puas",
                                                axisYType: "secondary",
                                                dataPoints: [
                                                    {y: <?php echo $persen_sp_bulan; ?>, label: "Sangat Puas", indexLabel: "<?php echo number_format($persen_sp_bulan, 2); ?>%"},
                                                    {y: <?php echo $persen_p_bulan; ?>, label: "Puas", indexLabel: "<?php echo number_format($persen_p_bulan, 2); ?>%"},
                                                    {y: <?php echo $persen_tp_bulan; ?>, label: "TIdak Puas", indexLabel: "<?php echo number_format($persen_tp_bulan, 2); ?>%"}
                                                ]
                                            }
                                        ]
                                    });
                                    chartbulan.render();
<?php
$pre_max = 0;
$bulan = 0;
for ($i = 0; $i < 12; $i++) {
    $bulan++;
    if ($data_polling_tahunan_jadi[0] == $bulan) {
        $tp[$bulan][1] = $data_polling_tahunan_jadi[1];
        $tp[$bulan][2] = $data_polling_tahunan_jadi[2];
        $tp[$bulan][3] = $data_polling_tahunan_jadi[3];
        $maxim = max($pre_max, $tp[$bulan][1], $tp[$bulan][2], $tp[$bulan][3]);
        $pre_max = $maxim;
        $data_polling_tahunan_jadi = mysqli_fetch_array($data_polling_tahunan);
    } else {
        $tp[$bulan][1] = $tp[$bulan][2] = $tp[$bulan][3] = 0;
    }
}

$batas = (floor($pre_max / 10) + 1) * 10;
$interval = $batas / 10;
?>
                                    // tahunan
                                    var charttahun = new CanvasJS.Chart("charttahun",
                                            {
                                                colorSet: "mycolor",
                                                backgroundColor: null,
                                                zoomEnabled: false,
                                                animationEnabled: true,
                                                title: {
                                                    text: " "
                                                },
                                                axisY: {
                                                    maximum: <?php echo '100'; ?>,
                                                    interval: <?php echo '20'; ?>,
                                                    labelFontSize: 20,
                                                    labelFontWeight: 500,
                                                    labelFontColor: "#212121",
                                                    gridDashType: "dash",
                                                    gridColor: "#858585",
                                                    suffix: "%"
                                                },
                                                axisX: {
                                                    interval: 1,
                                                    gridThickness: 0,
                                                    labelFontSize: 18,
                                                    labelFontColor: "#212121",
                                                    labelFontStyle: "normal",
                                                    labelFontWeight: "normal",
                                                    labelFontFamily: "Lucida Sans Unicode",
                                                    lineColor: "#212121",
                                                    tickLength: 5
                                                },
                                                theme: "theme1",
                                                toolTip: {
                                                    shared: true
                                                },
                                                data: [
                                                    {
                                                        type: "column",
                                                        indexLabelFontSize: 10,
                                                        indexLabelPlacement: "outside",
                                                        indexLabelFontColor: "#212121",
                                                        indexLabelFontWeight: 200,
                                                        lineThickness: 2,
                                                        showInLegend: true,
                                                        name: "Sangat Puas",
                                                        axisXType: "secondary",
                                                        dataPoints: [
                                                            {label: "Jan", y: <?php echo $persen_sp_tahun[1]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[1], 2); ?>%"},
                                                            {label: "Feb", y: <?php echo $persen_sp_tahun[2]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[2], 2); ?>%"},
                                                            {label: "Mar", y: <?php echo $persen_sp_tahun[3]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[3], 2); ?>%"},
                                                            {label: "Apr", y: <?php echo $persen_sp_tahun[4]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[4], 2); ?>%"},
                                                            {label: "Mei", y: <?php echo $persen_sp_tahun[5]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[5], 2); ?>%"},
                                                            {label: "Jun", y: <?php echo $persen_sp_tahun[6]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[6], 2); ?>%"},
                                                            {label: "Jul", y: <?php echo $persen_sp_tahun[7]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[7], 2); ?>%"},
                                                            {label: "Agt", y: <?php echo $persen_sp_tahun[8]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[8], 2); ?>%"},
                                                            {label: "Sept", y: <?php echo $persen_sp_tahun[9]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[9], 2); ?>%"},
                                                            {label: "Okt", y: <?php echo $persen_sp_tahun[10]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[10], 2); ?>%"},
                                                            {label: "Nov", y: <?php echo $persen_sp_tahun[11]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[11], 2); ?>%"},
                                                            {label: "Des", y: <?php echo $persen_sp_tahun[12]; ?>, indexLabel: "<?php echo number_format($persen_sp_tahun[12], 2); ?>%"}
                                                        ]
                                                    },
                                                    {
                                                        type: "column",
                                                        indexLabelFontSize: 10,
                                                        indexLabelPlacement: "outside",
                                                        indexLabelFontColor: "#212121",
                                                        indexLabelFontWeight: 200,
                                                        lineThickness: 2,
                                                        axisXType: "secondary",
                                                        showInLegend: true,
                                                        name: "Puas",
                                                        dataPoints: [
                                                            {label: "Jan", y: <?php echo $persen_p_tahun[1]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[1], 2); ?>%"},
                                                            {label: "Feb", y: <?php echo $persen_p_tahun[2]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[2], 2); ?>%"},
                                                            {label: "Mar", y: <?php echo $persen_p_tahun[3]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[3], 2); ?>%"},
                                                            {label: "Apr", y: <?php echo $persen_p_tahun[4]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[4], 2); ?>%"},
                                                            {label: "Mei", y: <?php echo $persen_p_tahun[5]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[5], 2); ?>%"},
                                                            {label: "Jun", y: <?php echo $persen_p_tahun[6]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[6], 2); ?>%"},
                                                            {label: "Jul", y: <?php echo $persen_p_tahun[7]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[7], 2); ?>%"},
                                                            {label: "Agt", y: <?php echo $persen_p_tahun[8]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[8], 2); ?>%"},
                                                            {label: "Sept", y: <?php echo $persen_p_tahun[9]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[9], 2); ?>%"},
                                                            {label: "Okt", y: <?php echo $persen_p_tahun[10]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[10], 2); ?>%"},
                                                            {label: "Nov", y: <?php echo $persen_p_tahun[11]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[11], 2); ?>%"},
                                                            {label: "Des", y: <?php echo $persen_p_tahun[12]; ?>, indexLabel: "<?php echo number_format($persen_p_tahun[12], 2); ?>%"}
                                                        ]
                                                    },
                                                    {
                                                        type: "column",
                                                        lineThickness: 2,
                                                        indexLabelFontSize: 10,
                                                        indexLabelPlacement: "outside",
                                                        indexLabelFontColor: "#212121",
                                                        indexLabelFontWeight: 200,
                                                        showInLegend: true,
                                                        name: "Tidak Puas",
                                                        axisXType: "primary",
                                                        dataPoints: [
                                                            {label: "Jan", y: <?php echo $persen_tp_tahun[1]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[1], 2); ?>%"},
                                                            {label: "Feb", y: <?php echo $persen_tp_tahun[2]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[2], 2); ?>%"},
                                                            {label: "Mar", y: <?php echo $persen_tp_tahun[3]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[3], 2); ?>%"},
                                                            {label: "Apr", y: <?php echo $persen_tp_tahun[4]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[4], 2); ?>%"},
                                                            {label: "Mei", y: <?php echo $persen_tp_tahun[5]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[5], 2); ?>%"},
                                                            {label: "Jun", y: <?php echo $persen_tp_tahun[6]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[6], 2); ?>%"},
                                                            {label: "Jul", y: <?php echo $persen_tp_tahun[7]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[7], 2); ?>%"},
                                                            {label: "Agt", y: <?php echo $persen_tp_tahun[8]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[8], 2); ?>%"},
                                                            {label: "Sept", y: <?php echo $persen_tp_tahun[9]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[9], 2); ?>%"},
                                                            {label: "Okt", y: <?php echo $persen_tp_tahun[10]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[10], 2); ?>%"},
                                                            {label: "Nov", y: <?php echo $persen_tp_tahun[11]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[11], 2); ?>%"},
                                                            {label: "Des", y: <?php echo $persen_tp_tahun[12]; ?>, indexLabel: "<?php echo number_format($persen_tp_tahun[12], 2); ?>%"}
                                                        ]
                                                    }
                                                ]
                                                ,
                                                legend: {
                                                    cursor: "pointer",
                                                    itemclick: function (e) {
                                                        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                                            e.dataSeries.visible = false;
                                                        }
                                                        else {
                                                            e.dataSeries.visible = true;
                                                        }
                                                        chart.render();
                                                    }
                                                }
                                            });
                                    charttahun.render();
                                }
                            </script>





                        </body>
                        </html>
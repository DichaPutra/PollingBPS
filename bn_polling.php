<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html onmousedown="WhichButton(event)">
    <head>
        <meta name="google-site-verification" content="VqN13JOyGCOXRTR_V_vB4giEsK0Oebi2oZ4sUWwiywI" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Poling BPS</title>

        <!-- core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet"></link>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.new.js"></script>
        <script src="js/canvasjs.js"></script>


        <!-- my style -->
        <link href="css/mystyle-default.css" rel="stylesheet"></link>
        <link href="css/marquee.css" rel="stylesheet"></link>
        <!-- <link href="css/mystyle-edit.css" rel="stylesheet"> -->

        <!-- sweet alert -->
        <script src="js/sweetalert.min.js"></script>
        <link rel="stylesheet" href="css/sweetalert.css"></link>

        <style type="text/css">
            @font-face {
                font-family: "Font Polling";
                src: url('fonts/denmark.ttf');
            }

            .font-denmark {
                font-family: "Font Polling";
            }
        </style>

    </head>

    <body class="latar-abu-terang" style="background-image:url(<?php
    if ($databackgroundrow == 0) {
        echo 'images/background/bromo.jpg';
    } else {
        echo mysqli_fetch_array($databackground)[0];
    }
    ?>); repeat:none; background-size:cover; cursor: none"  oncontextmenu="return false;">
        <!-- <body class="latar-putih"> -->
        <div class="container-fluid" style="cursor: none">

            <!-- Judul-->
            <h2 class="space-top-min text-center text-putih text-shadow font-denmark"><?php echo $datakonten_judul_jadi; ?></h2>
            <h3 class="margin-up-min text-center space-bottom-mid text-putih text-shadow font-denmark"><?php echo $datakonten_lokasi_jadi; ?> </h3>

            <!-- info graph -->
            <div class="col-md-9 no-pad" style="border-right:solid 1px #fff">

                <div class="col-md-12 no-padding" style="cursor: none">
                    <!-- grafik hari ini -->
                    <div class="col-md-6 no-pad">
                        <h3 class="text-putih margin-up-min text-shadow"><b>HARI INI :</b> <?php echo $total_harian; ?> Pengunjung</h3>
                        <div id="charthari" style="height: 200px; width: 100%;cursor:none; margin-left:-10px">
                        </div>
                    </div>

                    <!-- grafik bulan ini -->
                    <div class="col-md-6" style="border-left:1px solid #fff">
                        <h3 class="text-putih margin-up-min text-shadow"><b>BULAN INI :</b> <?php echo $total_bulanan; ?> Pengunjung</h3>
                        <div id="chartbulan" style="height: 200px; width: 100%; cursor:none;margin-left:-10px">
                        </div>
                    </div>

                </div>

                <div class="col-md-12 no-pad" style="cursor: none">
                    <!-- grafik tahun-->
                    <h3 class="text-putih text-shadow"><b>TAHUN INI :</b> <?php echo $total_tahunan;?> Pengunjung</h3>
                    <div id="charttahun" style="height: 300px; width: 100%; cursor:none;" >
                    </div>
                </div>

            </div>

            <div class="col-md-3" style="cursor: none">

                <div class="col-md-12">
                    <h3 class="space-bottom-min text-shadow text-putih"><?php echo $datakonten_subjudul_jadi; ?></h3>
                    <p class="text-putih text-shadow"><?php echo $datakonten_indikator_jadi; ?></p>
                </div>

                <!-- sangat puas -->
                <div class="col-md-12 no-padding">
                    <div class="col-md-2 no-pad">
                        <img src="images/sangatpuas.png" width="180%">
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-putih text-shadow">Sangat Puas</h4>
                    </div>
                </div>

                <!-- puas -->
                <div class="col-md-12 no-padding space-top-xs">
                    <div class="col-md-2 no-pad">
                        <img src="images/puas.png" width="180%">
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-putih text-shadow">Puas</h4>
                    </div>
                </div>

                <!-- tidak puas -->
                <div class="col-md-12 no-padding space-top-xs">
                    <div class="col-md-2 no-pad">
                        <img src="images/tidakpuas.png" width="180%">
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-putih text-shadow">Tidak Puas</h4>
                    </div>
                </div>

                <div class="col-md-12 no-pad space-top-min">
                    <h3 class="text-bold text-putih text-shadow">
                        <?php
                        setlocale(LC_TIME, 'IND');
                        echo strftime("%A");
                        ?>
                    </h3>
                    <h2 class="text-bold text-putih text-shadow margin-up-xs">
                        <?php
                        echo strftime("%d") . " " . strftime("%B") . " " . strftime("%Y");
                        ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- <div class="content"> -->
        <div class="container marquee-text" style="cursor: none">
            <div class="marquee-sibling">
                BPS News
            </div>
            <div class="marquee">
                <ul class="marquee-content-items">
                    <?php
                    if ($datarunningtextrow != 0) {
                        while ($row = mysqli_fetch_array($datarunningtext)) {
                            echo "<li> $row[0]</li>";
                        }
                    } else {
                        echo "<li> BPS Jatim</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- </div> -->

        <div id="sound"></div>

        <form method="POST" action="cn_pengunjung.php">
            <input type="hidden" name="sign_key" id="sign_key" value="">
        </form>

        <script type="text/javascript">
    function viewGraph() {
        $('.column').css('height', '0');
        $('table tr').each(function (index) {
            var persen = $(this).children('td').eq(1).text();
            var jumlah = $(this).children('td').eq(2).text();
            $('#col' + index).animate({height: persen}, 1500).html("<div>" + jumlah + "</div>");
        });
    }

    $(document).ready(function () {
        viewGraph();
    });
        </script>
        <script type="text/javascript" src="js/marquee.js"></script>
        <script>
    $(function () {
        createMarquee({
            duration: 100000,
            padding: 20,
            marquee_class: '.marquee',
            container_class: '.container',
            sibling_class: '.marquee-sibling',
            hover: false});
    });

    function SubmitButton0() {
        var element = document.getElementById("sign_key");
        element.value = '0';
        element.form.submit();
    }
    function SubmitButton1() {
        var element = document.getElementById("sign_key");
        element.value = '1';
        element.form.submit();
    }
    function SubmitButton2() {
        var element = document.getElementById("sign_key");
        element.value = '2';
        element.form.submit();
    }

    function WhichButton(event) {
        switch (event.button) {
            case 0 :
                document.getElementById("sound").innerHTML = '<audio autoplay="autoplay"><source src="silent_night.wav" type="audio/mpeg" /><embed hidden="true" autostart="true" loop="false" src="silent_night.wav" /></audio>';
                swal({
                    title: "Terima Kasih!",
                    text: "Atas Kunjungan Anda",
                    type: "success",
                    timer: 4000,
                    showConfirmButton: false
                });
                timeoutID = window.setTimeout(SubmitButton0, 4000);
                break;
            case 1 :
                swal({
                    title: "Terima Kasih!",
                    text: "Atas Kunjungan Anda",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                timeoutID = window.setTimeout(SubmitButton1, 2000);
                break;
            case 2 :
                swal({
                    title: "Terima Kasih!",
                    text: "Atas Kunjungan Anda",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                timeoutID = window.setTimeout(SubmitButton2, 2000);
                break;
        }

    }
        </script>

        <!-- script grafik -->
        <script type="text/javascript">
            window.onload = function () {
                CanvasJS.addColorSet("mycolor",
                        [//colorSet Array
                            "#00db1a",
                            "#ffce0a",
                            "#db0000"
                        ]);

                // charthari
                var charthari = new CanvasJS.Chart("charthari", {
                    colorSet: "mycolor",
                    backgroundColor: null,
                    animationEnabled: true,
                    axisY2: {
                        interlacedColor: "rgba(1,77,101,.2)",
                        gridColor: "rgba(1,77,101,.1)",
                        maximum: 100,
                        interval: 20,
                        labelFontSize: 20,
                        labelFontWeight: 500,
                        suffix: "%",
                        toolTipContent: "{y} (#percent%)",
                        labelFontColor: "#fff",
                        lineColor: "#fff",
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
                        lineColor: "#fff",
                        tickLength: 0


                    },
                    data: [
                        {
                            //showInLegend: true,
                            toolTipContent: "{y}%",
                            indexLabelFontSize: 25,
                            indexLabelPlacement: "outside",
                            indexLabelFontColor: "white",
                            indexLabelFontWeight: 500,
                            indexLabelFontFamily: "Verdana",
                            type: "bar",
                            name: "Sangat Puas",
                            axisYType: "secondary",
                            dataPoints: [
                                {y: <?php echo $persen_sp_hari; ?>, label: " ", indexLabel: "<?php echo number_format($persen_sp_hari, 2); ?>%"},
                                {y: <?php echo $persen_p_hari; ?>, label: " ", indexLabel: "<?php echo number_format($persen_p_hari, 2); ?>%"},
                                {y: <?php echo $persen_tp_hari; ?>, label: " ", indexLabel: "<?php echo number_format($persen_tp_hari, 2); ?>%"}
                            ]
                        }
                    ]
                });
                charthari.render();

                //chartbulan
                var chartbulan = new CanvasJS.Chart("chartbulan", {
                    colorSet: "mycolor",
                    backgroundColor: null,
                    animationEnabled: true,
                    axisY2: {
                        interlacedColor: "rgba(1,77,101,.2)",
                        gridColor: "rgba(1,77,101,.1)",
                        maximum: 100,
                        interval: 20,
                        labelFontSize: 20,
                        labelFontWeight: 500,
                        suffix: "%",
                        toolTipContent: "{y} (#percent%)",
                        labelFontColor: "#fff",
                        lineColor: "#fff",
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
                        lineColor: "#fff",
                        tickLength: 0
                    },
                    data: [
                        {
                            //showInLegend: true,
                            toolTipContent: "{y}%",
                            indexLabelFontSize: 25,
                            indexLabelPlacement: "outside",
                            indexLabelFontColor: "white",
                            indexLabelFontWeight: 500,
                            indexLabelFontFamily: "Verdana",
                            type: "bar",
                            name: "Sangat Puas",
                            axisYType: "secondary",
                            dataPoints: [
                                {y: <?php echo $persen_sp_bulan; ?>, label: " ", indexLabel: "<?php echo number_format($persen_sp_bulan, 2); ?>%"},
                                {y: <?php echo $persen_p_bulan; ?>, label: " ", indexLabel: "<?php echo number_format($persen_p_bulan, 2); ?>%"},
                                {y: <?php echo $persen_tp_bulan; ?>, label: " ", indexLabel: "<?php echo number_format($persen_tp_bulan, 2); ?>%"}
                            ]
                        }
                    ]
                });
                chartbulan.render();

                // charttahunan
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
                                labelFontColor: "#fff",
                                gridDashType: "dash",
                                gridColor: "#858585",
                                suffix: "%"
                            },
                            axisX: {
                                interval: 1,
                                gridThickness: 0,
                                labelFontSize: 18,
                                labelFontColor: "#fff",
                                labelFontStyle: "normal",
                                labelFontWeight: "normal",
                                labelFontFamily: "Lucida Sans Unicode",
                                lineColor: "#fff",
                                tickLength: 5
                            },
                            theme: "theme1",
                            toolTip: {
                                shared: true
                            },
                            legend: {
                                verticalAlign: "bottom",
                                horizontalAlign: "center",
                                fontSize: 15,
                                fontFamily: "Lucida Sans Unicode"
                            },
                            data: [
                                {
                                    type: "column",
                                    indexLabelFontSize: 12,
                                    indexLabelPlacement: "outside",
                                    indexLabelFontColor: "white",
                                    indexLabelFontWeight: 200,
                                    lineThickness: 2,
                                    //showInLegend: true,
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
                                    indexLabelFontSize: 12,
                                    indexLabelPlacement: "outside",
                                    indexLabelFontColor: "white",
                                    indexLabelFontWeight: 200,
                                    lineThickness: 2,
                                    axisXType: "secondary",
                                    // showInLegend: true,
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
                                    indexLabelFontSize: 12,
                                    indexLabelPlacement: "outside",
                                    indexLabelFontColor: "white",
                                    indexLabelFontWeight: 200,
                                    // showInLegend: true,
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
                            ],
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
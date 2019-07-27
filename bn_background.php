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
                <link rel="stylesheet" href="css/style-paralax.css">
                    <link rel="stylesheet" href="css/paralax.css">
                        <link rel="stylesheet" type="text/css" href="css/hover/default.css" />
                        <link rel="stylesheet" type="text/css" href="css/hover/component.css" />
                        <link rel="stylesheet" type="text/css" href="css/choose-file.css" />

                        <!-- <link rel="stylesheet" type="text/css" href="css/tablepaginaation.css" /> -->



                        <!-- js -->
                        <script src="js/modernizr.custom.js"></script>
                        <!-- // <script src="js/ajax.js"></script> -->
                        <script src="js/ajax.js"></script>
                        <script src="js/jquery.new.js"></script>
                        <script src="js/bootstrap.js"></script>
                        <script src="js/modernizr-paralax.js"></script>
                        <script src="js/fusionad-paralax.js"></script>
                        <!-- // <script src="js/canvasjs.js"></script> -->

                        <link href="css/mystyle-default.css" rel="stylesheet">
                            <link href="css/mystyle-edit.css" rel="stylesheet">


                                <!-- ganti banner background yang aktif -->
                                <style type="text/css">
                                    section.module.parallax-1 {
                                        background-image: url("<?php echo $data_background_aktif_jadi[2]; ?>");
                                        background-size:cover;
                                    }
                                </style>


                                </head>

                                <body class="latar-hitam-modern">
                                    <div id="st-container" class="st-container" style="width:100%">
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

                                                    <div class="wrapper margin-up-mid">
                                                        <main>
                                                            <section class="module parallax parallax-1">
                                                                <div class="container">
                                                                    <div class="col-md-12 text-putih text-center">

                                                                        <!-- text judul gambar yg aktif -->
                                                                        <h2 class="text-shadow margin-up"><?php echo $data_background_aktif_jadi[1]; ?></h2>
                                                                        <h4 class="text-shadow margin-up-min">Latar Halaman Poling Pelanggan Yang Aktif Saat Ini</h4>


                                                                        <a href="#latar" class="btn btn-danger"><span class="glyphicon glyphicon-picture"></span> Pilih Background Lainnya</a>

                                                                        <button class="btn btn-info" data-toggle="modal" data-target="#upload"><span class="glyphicon glyphicon-camera"></span> Upload Gambar</button>



                                                                    </div>
                                                                </div>
                                                            </section>

                                                        </main>
                                                    </div>

                                                    <section class="latar-abu-terang padding-bottom-lg" id="latar">
                                                        <div class="container-fluid">
                                                            <div class="col-md-12 space-bottom-min" style="margin-left:30px">
                                                                <h2 class="text-orange"> <strong>Pilih Background</strong> </h2>
                                                                <h4 class="margin-up-min"> list background yang tersedia </h4>
                                                            </div>

                                                            <!-- <div class="col-md-12 no-padding"> -->
                                                            <ul class="grid cs-style-3">
                                                                <?php for ($i = 0; $i < $count_data_background; $i++) { ?>
                                                                    <li class="col-md-4">
                                                                        <figure>
                                                                            <img src="<?php echo $data_background_jadi[2]; ?>">
                                                                                <figcaption>
                                                                                    <h3><?php echo $data_background_jadi[1]; ?></h3>
                                                                                    <span class="text-orange">Badan Pusat Statistik</span>
                                                                                    <form action="cn_admin.php" method="POST">
                                                                                        <input type="hidden" name="id" value="<?php echo $data_background_jadi[0]; ?>"></input>
                                                                                        <button class="btn btn-primary pull-right margin-up-min" type="submit" name="btn_set_aktif"> Pilih</button>
                                                                                    </form>
                                                                                </figcaption>
                                                                        </figure>
                                                                    </li>
                                                                    <?php
                                                                    $data_background_jadi = mysqli_fetch_array($data_background);
                                                                }
                                                                ?>

                                                            </ul>        
                                                            <!-- </div> -->





                                                        </div>
                                                    </section>





                                                  



                                                                            </div> <!-- pusher -->
                                                                            </div> <!--content-inner st-sidebar -->
                                                                            </div> <!--content st-sidebar -->
                                                                            </div> <!-- container st-sidebar  -->


                                                                            <!-- modal upload gambar -->
                                                                            <div class="modal fade bs-example-modal-sm" id="upload" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                                                <div class="modal-dialog modal-md">
                                                                                    <div class="modal-content space-top-lg">

                                                                                        <div class="modal-body" style="padding-top:25px">
                                                                                            <form action="cn_admin.php" method="POST" enctype="multipart/form-data">
                                                                                                <div class="space-bottom-xs">
                                                                                                    <p class="form-inner text-orange">Masukan Judul : </p>
                                                                                                    <input type="text" name="judul_nya" class="form-control" style="padding-left:126px; font-size:15px" required>
                                                                                                </div>
                                                                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                                                                <div class="input-group image-preview">
                                                                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                                                                        <span class="input-group-btn">

                                                                                                            <!-- image-preview-clear button -->
                                                                                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                                                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                                                                                            </button>
                                                                                                            <!-- image-preview-input -->               
                                                                                                            <div class="btn btn-default image-preview-input">
                                                                                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                                                                                <span class="image-preview-input-title">Pilih Gambar</span>
                                                                                                                <input type="file" accept="image/png, image/jpeg, image/gif, image/jpg" name="input-file-preview" required/> <!-- rename it -->
                                                                                                            </div>
                                                                                                            <button class="btn btn-success" name="btn_upload_image" type="submit"> Upload</button>

                                                                                                        </span>
                                                                                                </div><!-- /input-group image-preview [TO HERE]-->
                                                                                                <h6>- File maks 2 MB</h6>
                                                                                                <h6>- Dimensi maks 3000 x 2000 px</h6>
                                                                                            </form>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <script src="js/classie.js"></script>
                                                                            <script src="js/sidebarEffects.js"></script>
                                                                            <script src="js/toucheffects.js"></script>
                                                                            <script src="js/demo-paralax.js"></script>
                                                                            <script>
                                                                                $(function () {
                                                                                    $('a[href*=#]:not([href=#])').click(function () {
                                                                                        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                                                                                            var target = $(this.hash);
                                                                                            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                                                                                            if (target.length) {
                                                                                                $('html,body').animate({
                                                                                                    scrollTop: target.offset().top
                                                                                                }, 1000);
                                                                                                return false;
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                })
                                                                            </script>


                                                                            <!-- script choose file -->
                                                                            <script type="text/javascript">
                                                                                $(document).on('click', '#close-preview', function () {
                                                                                    $('.image-preview').popover('hide');
                                                                                    // Hover befor close the preview
                                                                                    $('.image-preview').hover(
                                                                                            function () {
                                                                                                $('.image-preview').popover('show');
                                                                                            },
                                                                                            function () {
                                                                                                $('.image-preview').popover('hide');
                                                                                            }
                                                                                    );
                                                                                });

                                                                                $(function () {
                                                                                    // Create the close button
                                                                                    var closebtn = $('<button/>', {
                                                                                        type: "button",
                                                                                        text: 'x',
                                                                                        id: 'close-preview',
                                                                                        style: 'font-size: initial;',
                                                                                    });
                                                                                    closebtn.attr("class", "close pull-right");
                                                                                    // Set the popover default content
                                                                                    $('.image-preview').popover({
                                                                                        trigger: 'manual',
                                                                                        html: true,
                                                                                        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                                                                                        content: "There's no image",
                                                                                        placement: 'bottom'
                                                                                    });
                                                                                    // Clear event
                                                                                    $('.image-preview-clear').click(function () {
                                                                                        $('.image-preview').attr("data-content", "").popover('hide');
                                                                                        $('.image-preview-filename').val("");
                                                                                        $('.image-preview-clear').hide();
                                                                                        $('.image-preview-input input:file').val("");
                                                                                        $(".image-preview-input-title").text("Browse");
                                                                                    });
                                                                                    // Create the preview image
                                                                                    $(".image-preview-input input:file").change(function () {
                                                                                        var img = $('<img/>', {
                                                                                            id: 'dynamic',
                                                                                            width: 250,
                                                                                            height: 200
                                                                                        });
                                                                                        var file = this.files[0];
                                                                                        var reader = new FileReader();
                                                                                        // Set preview image into the popover data-content
                                                                                        reader.onload = function (e) {
                                                                                            $(".image-preview-input-title").text("Change");
                                                                                            $(".image-preview-clear").show();
                                                                                            $(".image-preview-filename").val(file.name);
                                                                                            img.attr('src', e.target.result);
                                                                                            $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                                                                                        }
                                                                                        reader.readAsDataURL(file);
                                                                                    });
                                                                                });
                                                                            </script>

                                                                            </body>
                                                                            </html>
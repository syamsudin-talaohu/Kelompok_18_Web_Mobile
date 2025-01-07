<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UPLOAD BUKTI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/superfish.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/cs-select.css">
    <link rel="stylesheet" href="css/cs-skin-border.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">

            <?php include("header.php") ?>

            <div id="fh5co-tours" class="fh5co-section-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                            <h3>Upload Bukti Pembayaran</h3>
                            <p>Satu langkah lagi Untuk Proses Desain Aplikasimu</p>
                        </div>
                    </div>

                    <div class="row animate-box">
                        <div class="container grid">
                            <div class="row">
                                <div class="span5">
                                    <legend>Upload Bukti Pembayaran</legend>
                                    <p>Upload bukti bahwa anda telah melakukan pembayaran. Bukti yang diupload hanya berupa gambar (jpg, png, gif).</p>
                                    
                                    <?php
                                    // Koneksi ke database
                                    $_mysqli = new mysqli("localhost", "root", "", "design_kita");

                                    // Ambil id_pesan dari URL
                                    $id_pesan = $_GET['id'];

                                    // Query untuk mengambil file gambar dari database
                                    $query = $_mysqli->query("SELECT file FROM tbl_bukti WHERE id_pesan = '$id_pesan'");
                                    $data = $query->fetch_assoc();

                                    // Cek apakah ada gambar yang diupload
                                    if ($data && !empty($data['file'])) {
                                        echo '<p>Gambar telah terupload jika ingin upload ulang silahkan upload gambar baru</p>';
                                        echo '<img src="uploads/' . $data['file'] . '" alt="Bukti Pembayaran" style="max-width: 100%; height: auto;">';
                                    } else {
                                        echo '<p>Tidak ada gambar yang diupload.</p>';
                                    }
                                    ?>

                                    <form action="proses_upload.php?aksi=input" method="post" enctype="multipart/form-data">
                                        <div class="input-control text" data-role="input-control">
                                            <p>
                                                <input type="hidden" name="id_pesan" value="<?php echo $id_pesan; ?>">
                                                <input type="file" name="file">
                                            </p>
                                        </div>
                                        <input type="submit" value="Upload" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include("footer.php") ?>

        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/sticky.js"></script>
    <!-- Stellar -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Superfish -->
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Date Picker -->
    <script src="js/bootstrap-datepicker.min.js"></script>
    <!-- CS Select -->
    <script src="js/classie.js"></script>
    <script src="js/selectFx.js"></script>
    
    <!-- Main JS -->
    <script src="js/main.js"></script>

</body>
</html>
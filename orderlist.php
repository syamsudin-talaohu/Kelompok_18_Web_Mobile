<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>DESIGNkita</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
<meta name="author" content="FREEHTML5.CO" />

<!-- 
//////////////////////////////////////////////////////

FREE HTML5 TEMPLATE 
DESIGNED & DEVELOPED by FREEHTML5.CO

Website:         http://freehtml5.co/
Email:             info@freehtml5.co
Twitter:         http://twitter.com/fh5co
Facebook:         https://www.facebook.com/fh5co

//////////////////////////////////////////////////////
 -->

<!-- Facebook and Twitter integration -->
<meta property="og:title" content=""/>
<meta property="og:image" content=""/>
<meta property="og:url" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="shortcut icon" href="favicon.ico">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

<!-- Animate.css -->
<link rel="stylesheet" href="css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="css/icomoon.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- Superfish -->
<link rel="stylesheet" href="css/superfish.css">
<!-- Magnific Popup -->
<link rel="stylesheet" href="css/magnific-popup.css">
<!-- Date Picker -->
<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
<!-- CS Select -->
<link rel="stylesheet" href="css/cs-select.css">
<link rel="stylesheet" href="css/cs-skin-border.css">

<link rel="stylesheet" href="css/style.css">


<!-- Modernizr JS -->
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

<!-- end:header-top -->



<div id="fh5co-tours" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3>Order List</h3>
                <h2>Pembayaran Melalui Rek BRI An : DESIGNkita</h2>
                <h2>No Rek : 7625143613816</h2>
                <p>Berikut Order List Anda</p>
            </div>
        </div>



        <div class="row animate-box">
            <div class="container grid">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="info fg-white">
                                    <th class="text-left">ID Pesan</th>
                                    <th class="text-left">Tanggal Pesan</th>

                                    <th class="text-left">Paket Template </th>
                                    <th class="text-left">Instruktur </th>

                                    <th class="text-left">Harga Paket</th>
                                    <th class="text-left">Biaya Instruktur </th>
                                    <th class="text-left">Harga Total</th>
                                    <th class="text-left">Tahap Pengerjaan</th>
                                    <th class="text-left">Link GDrive</th>
                                    <th class="text-left">Aksi</th>

                                </tr>
                            </thead>

                            <tbody>

                            <?php

$id_user = $_SESSION['id_user'];
$_mysqli = new mysqli("localhost", "root", "", "design_kita");

// Tambahkan klausa ORDER BY untuk mengurutkan berdasarkan id_pesan
$comot = $_mysqli->query("
    SELECT * 
    FROM tbl_pesan, tbl_user, tbl_daerah, tbl_paket, tbl_hotel 
    WHERE tbl_pesan.id_user = tbl_user.id_user 
    AND tbl_pesan.id_paket = tbl_paket.id_paket 
    AND tbl_pesan.id_hotel = tbl_hotel.id_hotel 
    AND tbl_pesan.id_daerah = tbl_daerah.id_daerah 
    AND tbl_user.id_user = '$id_user'
    ORDER BY tbl_pesan.id_pesan ASC
");

while ($isi_tbl = mysqli_fetch_array($comot)) {
    $total_harga = $isi_tbl['harga_paket'] + $isi_tbl['biaya'] + $isi_tbl['harga'];
    if ($isi_tbl['status'] == 'S2') {
        $txtS = "Telah melakukan pembayaran";
    } else if ($isi_tbl['status'] == 'S3') {
        $txtS = "Melakukan pembayaran di tempat";
    }
?>
<tr>
    <td>BT-00<?php echo $isi_tbl['id_pesan']; ?></td>
    <td><?php echo $isi_tbl['tgl_pesan']; ?></td>
    <td><?php echo $isi_tbl['nama_paket']; ?></td>
    <td><?php echo $isi_tbl['hotel']; ?></td>
    <td><?php echo $isi_tbl['harga_paket']; ?> IDR</td>
    <td><?php echo $isi_tbl['harga']; ?> IDR</td>
    <td><?php echo $total_harga; ?> IDR</td>
    <td><?php echo $isi_tbl['tahap']; ?></td>
    <td>
        <?php if (!empty($isi_tbl['drive'])) { ?>
            <div class="drive-link">
                <a href="<?php echo $isi_tbl['drive']; ?>" target="_blank">View Link</a>
            </div>
        <?php } else { ?>
            -
        <?php } ?>
    </td>
    <td>
    <?php
    $now = date("Y-m-d");

    // Query untuk memeriksa apakah bukti pembayaran sudah terupload
    $id_pesan = $isi_tbl['id_pesan']; // Ambil id_pesan dari $isi_tbl
    $query_bukti = $_mysqli->query("SELECT file FROM tbl_bukti WHERE id_pesan = '$id_pesan'");
    $bukti_data = $query_bukti->fetch_assoc();

    if (($isi_tbl['status'] == 'S2' && $isi_tbl['tgl_tour'] >= $now) || 
        ($isi_tbl['status'] == 'S3' && $isi_tbl['tgl_tour'] >= $now)) {
        ?>
        <a class="btn btn-success" href="orderfinish.php?id=<?php echo $isi_tbl[0]; ?>" data-hint="<?php echo $txtS; ?>">Cetak BUKTI</a>
        <?php
    } else if ($isi_tbl['status'] == 'S4') {
        echo "Telah Tour";
    } else if ($isi_tbl['tgl_tour'] < $now) {
        echo "<a class='text-warning'><b>Expired!!</b></a>";
    } else {
        // Cek apakah bukti pembayaran sudah terupload
        if (!empty($bukti_data['file'])) {
            echo "<b>Terupload</b>";
        } else {
            echo "<b>Waiting..</b>";
        }
        ?>
        <br />
        <a class="btn btn-warning" href="uploadbukti.php?id=<?php echo $isi_tbl[0]; ?>" data-hint="Upload Bukti Pembayaran">Upload Bukti</a>
        <?php
    }
    ?>
</td>
</tr>
<?php
}
?>

</tbody>



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fh5co-blog-section -->

<?php include("footer.php") ?>



</div>
<!-- END fh5co-page -->

</div>
<!-- END fh5co-wrapper -->

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

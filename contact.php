<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DESIGNkita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

    <!-- Stylesheets -->
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

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
        .contact-info {
            display: block !important;
            text-align: center;
            margin: 20px 0;
            background-color: rgba(0, 0, 0, 0.5); /* Latar belakang hitam transparan */
            padding: 30px; /* Tambahkan jarak di dalam elemen */
            border-radius: 10px; /* Membuat sudut melengkung */
            color: white; /* Warna teks putih agar kontras */
        }

        .contact-info h3, .contact-info h2 {
            margin: 10px 0;
            color: white; /* Pastikan teks tetap putih */
        }

        .contact-info h2 {
            font-size: 36px; /* Ukuran teks lebih besar */
            margin-bottom: 20px;
        }

        .contact-info h3 {
            font-size: 24px; /* Ukuran teks lebih besar */
        }

        .contact-info a {
            color: #F78536; /* Warna oranye untuk tautan */
            text-decoration: none; /* Hilangkan garis bawah pada tautan */
        }

        .contact-info a:hover {
            text-decoration: underline; /* Garis bawah muncul saat hover */
        }
    </style>
</head>
<body>
<div id="fh5co-wrapper">
    <div id="fh5co-page">

        <?php include("header.php") ?>

        <div class="fh5co-hero">
            <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/syamm3.jpg);">
                <div class="desc">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <ul class="contact-info">
                                    <?php
                                    include 'class/paket.php'; // Pastikan file ini memiliki class untuk menangani koneksi database dan akses data
                                    $contact = new paket();
                                    $data = $contact->tampil_contact(); // Mengambil data kontak dari database
                                    if (!empty($data)) {
                                        foreach ($data as $row) {
                                            echo '<h2 class="text-center">DESIGNkita</h2>';
                                            echo '<h3 class="text-center"><i class="icon-location-pin"></i> Alamat: ' . htmlspecialchars($row['alamat']) . '</h3>';
                                            echo '<h3 class="text-center"><i class="icon-phone2"></i> Telpon: ' . htmlspecialchars($row['telepon']) . '</h3>';
                                            echo '<h3 class="text-center">
                                                    <a href="https://api.whatsapp.com/send?phone=' . htmlspecialchars($row['no_wa']) . '">
                                                        <i class="icon-whatsapp"></i> ' . htmlspecialchars($row['no_wa']) . '
                                                    </a>
                                                  </h3>';
                                            echo '<h3 class="text-center">
                                                    <i class="icon-mail"></i>
                                                    <a href="mailto:' . htmlspecialchars($row['email']) . '">EMAIL : ' . htmlspecialchars($row['email']) . '</a>
                                                  </h3>';
                                        }
                                    } else {
                                        echo '<h3 class="text-center">Data kontak tidak tersedia</h3>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("footer.php") ?>

    </div>
</div>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/sticky.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/selectFx.js"></script>
<script src="js/main.js"></script>
</body>
</html>
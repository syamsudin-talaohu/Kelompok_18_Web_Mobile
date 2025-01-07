<?php
include '../class/order.php';

$db = new order();

if (isset($_POST['id_pesan']) && isset($_POST['tahap']) && isset($_POST['drive'])) {
    $id_pesan = $_POST['id_pesan'];
    $tahap = $_POST['tahap'];
    $drive = $_POST['drive'];

    // Update tahap dan drive di database
    $db->update_tahap($id_pesan, $tahap); // Update tahap
    $db->update_drive($id_pesan, $drive); // Update drive

    // Redirect kembali ke halaman transaksi sukses
    header("Location: admin.php#ajax/transaksi_sukses.php");
} else {
    echo "Data tidak valid!";
}
?>

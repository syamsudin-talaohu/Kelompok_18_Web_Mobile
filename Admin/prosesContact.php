<?php
include '../class/paket.php';

$db = new paket();

if ($_POST['aksi'] == 'update') {
    $id = $_POST['id'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $no_wa = $_POST['no_wa'];
    $email = $_POST['email'];

    $result = $db->update_contact($id, $alamat, $telepon, $no_wa, $email); // Fungsi untuk update data
    if ($result) {
        echo "<script>
            alert('Data berhasil diperbarui.');
            window.location.href = 'admin.php#ajax/contact.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diperbarui.');
            window.location.href = 'admin.php#ajax/contact.php';
        </script>";
    }
}
?>

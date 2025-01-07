<?php 
include 'class/bukti.php';
$db = new bukti();

$aksi = $_GET['aksi'];

if($aksi == "input"){ 	
    $db->insert($_POST['id_pesan'], $_FILES['file']['name']);
    
    echo '<script language="Javascript">
        alert("Data berhasil di upload!");
        window.location.href = "orderlist.php";
    </script>';
}
?>

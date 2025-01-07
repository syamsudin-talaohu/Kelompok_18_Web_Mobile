<?php 

include "koneksi.php";

class paket extends database {
    protected $db;

    function __construct() {
        $this->db = $this->getConnection();
    }

    function tampil_data() {
        $sql = "SELECT * FROM tbl_paket";
        $result = mysqli_query($this->db, $sql);
        $hasil = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function hapus($id_paket) {
        $sql = "DELETE FROM tbl_paket WHERE id_paket='$id_paket'";
        mysqli_query($this->db, $sql);
    }

    function input($nama_paket, $harga_paket, $ket_paket) {
        $sql = "INSERT INTO tbl_paket (nama_paket, harga_paket, ket_paket) 
                VALUES ('$nama_paket', '$harga_paket', '$ket_paket')";
        mysqli_query($this->db, $sql);
    }

    function edit($id_paket) {
        $sql = "SELECT * FROM tbl_paket WHERE id_paket='$id_paket'";
        $result = mysqli_query($this->db, $sql);
        $hasil = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function update($id_paket, $nama_paket, $harga_paket, $ket_paket) {
        $sql = "UPDATE tbl_paket 
                SET nama_paket='$nama_paket', harga_paket='$harga_paket', ket_paket='$ket_paket' 
                WHERE id_paket='$id_paket'";
        mysqli_query($this->db, $sql);
    }

    function tampil_contact() {
        $sql = "SELECT * FROM contact"; // Pastikan tabel bernama 'contact'
        $result = mysqli_query($this->db, $sql);
        $hasil = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function get_contact_by_id($id) {
        $sql = "SELECT * FROM contact WHERE id='$id'";
        $result = mysqli_query($this->db, $sql);
        return mysqli_fetch_assoc($result);
    }

    function update_contact($id, $alamat, $telepon, $no_wa, $email) {
        $sql = "UPDATE contact 
                SET alamat='$alamat', telepon='$telepon', no_wa='$no_wa', email='$email' 
                WHERE id='$id'";
        return mysqli_query($this->db, $sql);
    }
}
?>

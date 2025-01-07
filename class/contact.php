<?php 

include "koneksi.php";

class contact extends database {
    protected $db;

    function __construct() {
        $this->db = $this->getConnection();
    }

    function tampil_contact() {
        $sql = "SELECT * FROM contact";
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

<?php
include '../../class/paket.php';

$db = new paket();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $db->get_contact_by_id($id); // Fungsi untuk mendapatkan data berdasarkan ID
    if ($data) {
?>
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="prosesContact.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Kontak</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" name="telepon" value="<?php echo $data['telepon']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_wa">No WA</label>
                            <input type="text" class="form-control" name="no_wa" value="<?php echo $data['no_wa']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="aksi" value="update">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
<?php
    } else {
        echo "Data tidak ditemukan.";
    }
}
?>

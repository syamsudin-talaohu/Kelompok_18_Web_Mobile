<?php
include '../../class/order.php';

$db = new order();

if (isset($_GET['id_pesan'])) {
    $id_pesan = $_GET['id_pesan'];
    $data = $db->cek_bukti($id_pesan); // Mengambil data berdasarkan ID Pesan

    if (!empty($data)) {
        $tahap = $data[0]['tahap'];
        $drive = $data[0]['drive']; // Ambil nilai drive dari database
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="proses_edit_tahap.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Tahap dan Drive</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_pesan" value="<?php echo $id_pesan; ?>">
                        <div class="form-group">
                            <label for="tahap">Tahap</label>
                            <select class="form-control" name="tahap" id="tahap">
                                <option value="Sedang Dikerjakan" <?php echo ($tahap == 'Sedang Dikerjakan') ? 'selected' : ''; ?>>Sedang Dikerjakan</option>
                                <option value="Selesai" <?php echo ($tahap == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="drive">Link Drive</label>
                            <input type="text" class="form-control" name="drive" id="drive" value="<?php echo htmlspecialchars($drive); ?>" placeholder="Masukkan link drive">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID Pesan tidak ditemukan!</div>";
}
?>

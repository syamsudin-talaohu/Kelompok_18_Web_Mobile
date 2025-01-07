<?php 
include '../../class/admin.php';
$db = new admin();
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data User</h4>
        </div>

        <div class="modal-body">
            <form action="prosesAdmin.php?aksi=update" method="post" enctype="multipart/form-data">
                <?php foreach ($db->edit($_GET['id']) as $d) { ?>
                
                <!-- Ganti Foto -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                
                <!-- Username -->
                <div class="col-md-6">
                    <label>Username</label>
                    <div class="form-group">
                        <input type="text" name="user_admin" value="<?php echo $d['user_admin']; ?>" class="form-control">
                    </div>
                </div>
                
                <!-- Password -->
                <div class="col-md-6">
                    <label>Password</label>
                    <div class="form-group" style="position: relative;">
                        <input type="password" name="pass_admin" value="<?php echo htmlspecialchars($d['pass_admin']); ?>" class="form-control" id="pass_admin">
                        <button type="button" onclick="togglePassword()" class="btn btn-default" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                            <i class="fa fa-eye" id="toggle-icon"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Level -->
                <div class="col-md-6">
                    <label>Level</label>
                    <div class="form-group">
                        <p>
                            <input type="radio" name="level" value="1" <?php if ($d['level'] == "1") { echo "checked"; } ?>> Administrator
                        </p>
                    </div>
                </div>
                
                <!-- Nama -->
                <div class="col-md-6">
                    <label>Nama</label>
                    <div class="form-group">
                        <input type="text" name="nama" value="<?php echo $d['nama']; ?>" class="form-control">
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="col-md-12">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>
                
                <?php } ?>
            </form>
        </div>

        <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
        </div>

    </div>
</div>

<!-- JavaScript untuk Tombol Mata -->
<script>
function togglePassword() {
    const passwordInput = document.getElementById('pass_admin');
    const toggleIcon = document.getElementById('toggle-icon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
</script>

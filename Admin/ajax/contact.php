<?php
session_start();
if (empty($_SESSION)) {
    header("Location: index.php");
}

include '../../class/paket.php';

$db = new paket();
?>
<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Update Contact</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-address-book"></i>
                    <span>Contact Information</span>
                </div>
                <div class="box-icons">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="expand-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>No WA</th>
                                <th>Email</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($db->tampil_contact() as $x) { // Fungsi untuk menampilkan semua data kontak
                            ?>
                                <tr>
                                    <td><?php echo $x['id']; ?></td>
                                    <td><?php echo $x['alamat']; ?></td>
                                    <td><?php echo $x['telepon']; ?></td>
                                    <td><?php echo $x['no_wa']; ?></td>
                                    <td><?php echo $x['email']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning open_modal" id="<?php echo $x['id']; ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        
                                       

                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>No WA</th>
                                <th>Email</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="ModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".open_modal").click(function (e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "ajax/edit_contact.php",
                type: "GET",
                data: { id: m },
                success: function (ajaxData) {
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show', { backdrop: 'true' });
                }
            });
        });
    });
</script>

<script type="text/javascript">
    // Run Datatables plugin and create settings
    function AllTables() {
        TestTable1();
        TestTable2();
        TestTable3();
        LoadSelect2Script(MakeSelect2);
    }
    function MakeSelect2() {
        $('select').select2();
        $('.dataTables_filter').each(function () {
            $(this).find('label input[type=text]').attr('placeholder', 'Search');
        });
    }
    $(document).ready(function () {
        // Load Datatables and run plugin on tables 
        LoadDataTablesScripts(AllTables);
        // Add Drag-n-Drop feature
        WinMove();
    });
</script>

<?php
session_start();
if (empty($_SESSION)) {
    header("Location: index.php");
}

include '../../class/order.php';

$db = new order();
?>

<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Transaksi Sukses</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-upload"></i>
                    <span>Transaksi Sukses</span>
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
    <style>
        table.table th,
        table.table td {
            word-wrap: break-word;
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .drive-link {
            display: inline-block;
            max-width: 150px; /* Batasi lebar teks */
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            vertical-align: middle;
        }

        .drive-link a {
            color: #007bff;
            text-decoration: none;
        }

        .drive-link a:hover {
            text-decoration: underline;
        }
    </style>
    <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
        <thead>
            <tr>
                <th>Tgl Pesan</th>
                <th>Tgl Mulai</th>
                <th>ID Pesan</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Jasa</th>
                <th>Status</th>
                <th>Tahap</th>
                <th>Drive</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($db->tampil_data() as $x) {
            if ($x['status'] == "S2") { // Menampilkan hanya transaksi sukses (Sukses)
                $now = date("Y-m-d");
                ?>
                <tr>
                    <td><?php echo $x['tgl_pesan']; ?></td>
                    <td>
                        <?php
                        if ($x['tgl_tour'] < $now) {
                            $txtS = "Kadaluarsa!!";
                            echo "<div class='tooltip-demo'><span data-toggle='tooltip' data-placement='top' title='" . $txtS . "'><div class='text-danger'><i class='fa fa-warning'></i>&nbsp" . $x['tgl_tour'] . "</div></span></div>";
                        } else {
                            echo $x['tgl_tour'];
                        }
                        ?>
                    </td>
                    <td><?php echo $x['id_pesan']; ?></td>
                    <td><?php echo $x['nama_user']; ?></td>
                    <td><?php echo $x['nama_paket']; ?></td>
                    <td><?php echo $x['hotel']; ?></td>
                    <td>Sukses</td>
                    <td><?php echo $x['tahap']; ?></td>
                    <td>
                        <div class="drive-link">
                            <a href="<?php echo $x['drive']; ?>" target="_blank" title="<?php echo $x['drive']; ?>">
                                <?php echo $x['drive']; ?>
                            </a>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-primary open_modal" id="<?php echo $x['id_pesan']; ?>">Edit</button>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Tgl Pesan</th>
                <th>Tgl Mulai</th>
                <th>ID Pesan</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Jasa</th>
                <th>Status</th>
                <th>Tahap</th>
                <th>Drive</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

        </div>
    </div>
</div>

<?php include ('../modal/modal_delete.php'); ?>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="ModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".open_modal").click(function (e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "ajax/edit_tahap.php", // File yang menangani modal edit tahap dan drive
                type: "GET",
                data: { id_pesan: m },
                success: function (ajaxData) {
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show', { backdrop: 'true' });
                }
            });
        });
    });
</script>

<script type="text/javascript">
function AllTables(){
    TestTable1();
    TestTable2();
    TestTable3();
    LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
    $('select').select2();
    $('.dataTables_filter').each(function(){
        $(this).find('label input[type=text]').attr('placeholder', 'Search');
    });
}
$(document).ready(function() {
    LoadDataTablesScripts(AllTables);
    WinMove();
});
</script>

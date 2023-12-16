<?php
include "main/session.php";
/* @var $obj db */
ob_start();
?>
<div class="page-body">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="my-0 text-1xl font-semibold text-gray-700 dark:text-gray-200">Roles</h3>
            <div class="card-tools">
                <?php if (in_array(46, $permissions)) { ?>
                    <a data-bs-toggle='modal' data-bs-target='#modal-report' onclick='dynamicmodal("none", "addstocklist", "", "Add New Stock")' class="btn btn-primary">
                        <b> + Add Stock List</b>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <!-- /.card-header -->
            <div class="w-full">
                <table id="example2" class="table w-full whitespace-no-wrap">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Expire On</th>
                            <!-- <th>Description/Symbol</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot></tfoot>
                    <!--<-->
                </table>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->

        </div>
    </div>
    <!-- /.card -->
    <!-- /.col -->
</div>
<?php
$pagemaincontent = ob_get_clean();
ob_clean();
$extracss = "";
$extrajs = '';
$pagemeta = "";
$pagetitle = "View Stock List::.Manage Stock Lists-Admin";
$pageheader = "Manage Stock Lists";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
              <li class="breadcrumb-item active">Stock List Management</li>
            </ol>';
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/stocklistdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>
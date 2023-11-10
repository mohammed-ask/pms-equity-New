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
                <?php if (in_array(5, $permissions)) { ?>
                    <a href="addrole" class="btn btn-primary">
                        <b> + Add Role</b>
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
$pagetitle = "View Role::.Manage Roles-Admin";
$pageheader = "Manage Roles";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Role Management</li>
            </ol>';
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/rolesdata.php",
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
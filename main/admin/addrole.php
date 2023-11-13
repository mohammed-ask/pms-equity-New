<?php
include "main/session.php";
/* @var $obj db */
ob_start();
// print_r($permissions);
if ($employeeid != $adminid) {
    $moduleid = $obj->selectfieldwhere('permissions', "group_concat(DISTINCT module)", 'id IN (' . implode(",", $permissions) . ') and module != 5');
} else {
    $moduleid = $obj->selectfieldwhere('permissions', "group_concat(DISTINCT module)", 'id IN (' . implode(",", $permissions) . ')');
}
// echo $moduleid;
// die;
?>
<div class="row">
    <div class="col-12 mobile-bottom-margin">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Role</h3>
                <div class="card-tools">
                    <a href="viewrole" class="px-4 py-2  text-sm  bg-white  rounded-lg border border-gray" data-card-widget="">
                        << Back </a>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button> -->
                </div>
            </div>
            <form id="addrole" onsubmit="event.preventDefault();sendForm('', '', 'insertrole', 'resultid', 'addrole');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" placeholder="" name="name">
                    </div>
                    <div class="row">
                        <?php
                        $resultmodule = $obj->selectextrawhere("modules", "status=1 and id in ($moduleid) order by department  ");
                        while ($rowmodule = $obj->fetch_assoc($resultmodule)) {
                        ?>
                            <div class="col-md-6">
                                <div class="card card-widget">
                                    <div class="card-header">
                                        <div class=" d-inline ">
                                            <input type="checkbox" id="" title="checkall" onclick="$('.module<?php echo $rowmodule['id']; ?>').prop('checked', $(this).prop('checked'));" class="">
                                            <label for="<?php echo str_replace(" ", "_", $rowmodule['name']); ?>"><?php echo $rowmodule['name']; ?></label>
                                        </div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                            $resultpermission = $obj->selectextrawhere("permissions", "status=1 and module='" . $rowmodule['id'] . "' and id IN ( " . implode(", ", $permissions) . " )");
                                            while ($rowpermission = $obj->fetch_assoc($resultpermission)) {
                                            ?>
                                                <div class="col-sm-6 mb-2">
                                                    <div class=" d-inline">
                                                        <input type="checkbox" class="module<?php echo $rowmodule['id']; ?> dept<?php echo $rowdepartment['id']; ?>" id="" name="permissions[]" value="<?php echo $rowpermission['id']; ?>">
                                                        <label for="<?php echo str_replace(" ", "_", $rowpermission['name']); ?>">
                                                            <?php echo $rowpermission['name']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success ">Save</button>
                    <div id="resultid" class="form-result"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.col -->
</div>
<?php
$pagemaincontent = ob_get_clean();
ob_clean();
$extracss = "";
$extrajs = '
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
';
$pagemeta = "";
$pagetitle = "Add Role::.Manage Roles-Admin";
$pageheader = "Manage Roles";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "templete.php";
?>
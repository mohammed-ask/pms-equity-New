<?php
include "main/session.php";
$id = $_GET['hakuna'];
$result4 = $obj->selectextrawhere('codegenerator', "`category` like 'employeecode'");
$num4 = $obj->total_rows($result4);
$codegeneratorid = 0;
$codenumber = 0;
if ($num4) {
    $row4 = $obj->fetch_assoc($result4);
    $codegeneratorid = $row4['id'];
    $codenumber = $row4['number'] + 1;
    $generatedcode = sprintf('%04d', $codenumber);
    // $month = strtoupper(date("M", strtotime($date)));
    $uniqueid = str_replace(array("{prefix}", "{number}"), array($row4['prefix'], $generatedcode), $row4['pattern']);
} else {
    $cg['prefix'] = "EMP";
    $cg['number'] = 0;
    $cg['pattern'] = "{prefix}{number}";
    $cg['category'] = "employeecode";
    // $fsed = getfirstandlastday($date);
    $cg['addedon'] = date("Y-m-d H:i:s");
    $cg['addedby'] = $employeeid;
    $cg['status'] = 1;
    $codegeneratorid = $obj->insertnew("codegenerator", $cg);
    $codenumber = 1;
    $generatedcode = sprintf('%03d', $codenumber);
    $uniqueid = str_replace(array("{prefix}", "{number}"), array($cg['prefix'], $generatedcode), $cg['pattern']);
}
?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertemployee', 'resultid', 'adduser');return 0;">

<div class="row">
    <label class="col-6 block text-sm mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Employee ID</span>
        <input name="usercode" class="form-control" readonly value="<?= $uniqueid ?>" placeholder="Enter Employee ID" />
    </label>
    <label class="col-6 block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input name="name" data-bvalidator="required" class="form-control" placeholder="Employee's Name" />
    </label>
</div>

<div class="row">

    <label class="col-6 block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Mob No.</span>
        <input type="number" name="phone" data-bvalidator="minlength[10],maxlength[10]" class="form-control" placeholder="Employee Mobile No." />
    </label>
    <label class="col-6 block text-sm mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <input name="email" data-bvalidator="required,email" class="form-control" placeholder="Employee's Email ID" />
    </label>
</div>

<div class="row">
    <label class="col-4 block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Password</span>
        <input type="password" data-bvalidator="required,minlength[6]" id="password" name="password" class="form-control" placeholder="Strong Password!" />
    </label>
    <label class="col-4 block text-md" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Select Role</span>
        <select data-bvalidator="required" class="form-control select2" name="role" id="role">
            <option value="">Select Role</option>
            <?php
            $role = $obj->selectextrawhereupdate("roles", "id,name", "status = 1 and id != 1 and added_by = $employeeid");
            $emprole = mysqli_fetch_all($role);
            foreach ($emprole as list($id, $name)) { ?>
                <option value="<?php echo $id; ?>"> <?php echo $name; ?></option>
            <?php
            } ?>
        </select>
    </label>
    <label class="col-4 block text-md" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Login Allowed</span>
        <select data-bvalidator="required" class="form-control select2" name="activate" id="login">
            <option value="">Login Allowed?</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </label>


</div>


    


    <div>
        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium d-none">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>
<script>
    $('select').select2()
</script>
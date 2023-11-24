<?php
include "main/session.php";
$id = $_GET['hakuna'];
$rowemployee = $obj->selectextrawhere("users", "id=" . $id . "")->fetch_assoc();
?>
<form id="adduser" onsubmit="event.preventDefault();sendForm('id', '<?= $id ?>', 'updatemployee', 'resultid', 'adduser');return 0;">
<div>    
<div class="row">
<label class="col-lg-4 col-md-6 col-sm-6 block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input name="name" data-bvalidator="required" class="form-control" value="<?= $rowemployee['name'] ?>" placeholder="Employee's Name" />
    </label>
    <label class="col-lg-4 col-md-6 col-sm-6 block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Mob No.</span>
        <input type="number" name="phone" data-bvalidator="minlength[10],maxlength[10]" class="form-control" value="<?= $rowemployee['mobile'] ?>" placeholder="Employee Mobile No." />
    </label>
    <label class="col-lg-4 col-md-6 col-sm-6 block text-sm mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <input name="email" data-bvalidator="required,email" class="form-control" value="<?= $rowemployee['email'] ?>" placeholder="Employee's Email ID" />
    </label></div>

    <div class="row">
    <label class="col-lg-4 col-md-6 col-sm-6 block text-sm  mb-3" style="margin-bottom: 5px;position:relative">
        <span class="text-gray-700 dark:text-gray-400">Password</span>
        <input type="password" data-bvalidator="required,minlength[6]" id="password" name="password" class="form-control" value="<?= $rowemployee['password'] ?>" placeholder="Please Give Strong Password!" />
        <i id="eye" class="fa fa-eye" style="position: absolute;top:34px;right:10px;z-index:50" aria-hidden="true"></i>
    </label>
    <label class="col-lg-4 col-md-6 col-sm-6 block text-md" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Employee Role</span>
        <select data-bvalidator="required" class="form-control select2" name="role" id="role">
            <option value="">Select Role</option>
            <?php
            $role = $obj->selectextrawhereupdate("roles", "id,name", "status = 1");
            $emprole = mysqli_fetch_all($role);
            foreach ($emprole as list($id, $name)) { ?>
                <option value="<?php echo $id; ?>" <?= ($id == $rowemployee['role']) ? 'selected' : '' ?>> <?php echo $name; ?></option>
            <?php
            } ?>
        </select>
    </label>
    <label class="col-lg-4 col-md-6 col-sm-6 block text-md" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Login Allowed</span>
        <select data-bvalidator="required" class="form-control select2" name="activate" id="login">
            <option value="">Choose One</option>
            <option value="Yes" <?= ($rowemployee['activate'] == 'Yes') ? 'selected' : '' ?>>Yes</option>
            <option value="No" <?= ($rowemployee['activate'] == 'No') ? 'selected' : '' ?>>No</option>
        </select>
    </label></div>
</div>
    <br>
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
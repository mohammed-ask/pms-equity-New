<?php
include "main/session.php";
$id = $_GET['hakuna'];
$what = $_GET['what'];
$rowmail = $obj->selectextrawhere("mail", "id=" . $id . "")->fetch_assoc();
$attachment = $obj->selectextrawhere('maildocuments', "mailid=" . $id . "");
$type = $what == 'sentmail' ? 'senderid' : 'receiverid';
?>
<div class="col-12">
    <label class="form-label" for="Quantity">Subject:</label>
    <input disabled type="text" value="<?= $rowmail['subject'] ?>" class="form-control form-control-sm" style=" border: none !important;" id="">
</div>
<div class="col-12">
    <label class="form-label" for="Price">Message</label>
    <div class="block w-full dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" style="height:200px; overflow-y: scroll;"><?= $rowmail['message'] ?></div>
</div>
<p>Attachments:</p>
<div>
    <?php
    while ($rowattachment = $obj->fetch_assoc($attachment)) {
        $path = $obj->selectfieldwhere("uploadfile", "path", "id=" . $rowattachment['path'] . "");
        $orgname = $obj->selectfieldwhere("uploadfile", "orgname", "id=" . $rowattachment['path'] . "");
    ?>
        <a target="_blank" class="w-full my-3 px-3 py-1 rounded-lg text-sm font-medium bg-theme-mail-attachments" href="<?= $path ?>"><?= $orgname ?></a>
    <?php } ?>
</div>
<script>
    $('#modalfooterbtn').html('Reply')
</script>
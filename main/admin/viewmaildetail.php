<?php
include "main/session.php";
$id = $_GET['hakuna'];
$what = $_GET['what'];
$rowmail = $obj->selectextrawhere("mail", "id=" . $id . "")->fetch_assoc();
$attachment = $obj->selectextrawhere('maildocuments', "mailid=" . $id . "");
$type = $what == 'sentmail' ? 'senderid' : 'receiverid';
?>

<div class="row">
<label class="col-6 block text-sm" style="margin-bottom: 5px;">
    <span class="text-gray-700 dark:text-gray-400">Email
        <?= $what == 'sentmail' ? 'Send From :' : 'Received in :' ?></span>
    <input style="border: none !important;" disabled class="padding: 5px; border-color: #00aaaa; font-size: 14px; form-control" value="<?= $sendmailfrom ?>" />
</label>
<label class="col-6 block text-sm" style="margin-bottom: 5px;">
    <span class="text-gray-700 dark:text-gray-400">Subject:</span>
    <input disabled style="border: none !important;" class="padding: 5px; border-color: #00aaaa; font-size: 14px; form-control" value="<?= $rowmail['subject'] ?>" placeholder="Message Subject" />
</label>
</div>

<div> <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400 ">Message</span>

    </label>
    <div class="block w-full" style="height:200px; overflow-y: scroll; border: 0.5px solid gainsboro;
    padding: 5px; border-radius: 5px; font-size: 12px;"><?= $rowmail['message'] ?></div>
    <!-- <textarea class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Client's Name" id="" name="w3review" rows="8" cols="50"></textarea> -->

</div>
<p class="mt-2 text-sm font-semibold">
    Attachments:</p>
<div>
    <?php
    while ($rowattachment = $obj->fetch_assoc($attachment)) {
        $path = $obj->selectfieldwhere("uploadfile", "path", "id=" . $rowattachment['path'] . "");
        $orgname = $obj->selectfieldwhere("uploadfile", "orgname", "id=" . $rowattachment['path'] . "");
    ?>
        <a target="_blank" class="w-full my-3 px-3 py-1" style="background-color: #696cff6e; color: #0d0f4e; border-radius: 5px;" href="<?= $path ?>"><?= $orgname ?></a>
    <?php } ?>
</div>
<!-- <div>
    <button onclick='redir("<?= $rowmail["senderid"] ?>","","composemail","_blank")' id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium hidden">
        Submit
    </button>
    <div id='redirect'></div>
</div> -->
<div id="resultid"></div>
<script>
    $('#modalfooterbtn').html('Reply')
</script>
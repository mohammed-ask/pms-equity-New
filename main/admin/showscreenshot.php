<?php
include "main/session.php";
$pmid = $_GET['hakuna'];

?>
<img style="height:450px;width:510px" src="../<?= $obj->fetchattachment($pmid) ?>" />
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>
<?php
include "main/session.php";
$pmid = $_GET['hakuna'];

?>
<img width="100%" src="../<?= $obj->fetchattachment($pmid) ?>" />
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>
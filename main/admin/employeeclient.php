<?php
include "main/session.php";
$id = $_GET['hakuna'];
$empcode = $obj->selectfieldwhere("users", "usercode", "id=" . $id . "");
$cust = $obj->selectextrawhere('users', "employeeref = '" . $empcode . "'");
?>
<div class="w-full overflow-hidden rounded-lg shadow-xs">

    <div class="w-full ">

        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-3 py-2">S.No.</th>
                    <th class="px-3 py-2">Clients Name</th>
                    <th class="px-3 py-2">Mobile No.</th>
                    <th class="px-3 py-2">EMail</th>

                </tr>
            </thead>
            <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $i = 1;
                while ($rowcust = $obj->fetch_assoc($cust)) { ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class=" px-3 py-2 text-sm"><?= $i ?></td>
                        <td class=" px-3 py-2 text-sm">
                            <?= $rowcust['name'] ?>
                        </td>
                        <td class=" px-3 py-2 text-sm">
                            <?= $rowcust['mobile'] ?>
                        </td>
                        <td class=" px-3 py-2 text-sm">
                            <?= $rowcust['email'] ?> </td>

                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $("#modalfooterbtn").css('display', 'none')
</script>
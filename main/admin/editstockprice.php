<?php
include "main/session.php";
$id = $_GET['hakuna'];
$rowstock = $obj->selectextrawhere("stocktransaction", "id=" . $id . "")->fetch_assoc();
?>
<form id="stock" onsubmit="event.preventDefault();sendForm('id', '<?= $id ?>', 'updatestockprice', 'resultid', 'stock');return 0;">
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <div class="form-control"><?= $obj->selectfieldwhere('users', 'name', 'id=' . $rowstock['userid'] . '') ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Lot</span>
        <div class="form-control"><?= $rowstock['mktlot'] ?></div>
    </label>
    <label class="block text-sm  mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Quantity</span>
        <div class="form-control"><?= $rowstock['qty'] ?></div>
    </label>
    <label class="block text-sm mb-3" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Price</span>
        <input name="qty" class="hidden" value="<?= $rowstock['qty'] ?>" />
        <input name="userid" class="hidden" value="<?= $rowstock['userid'] ?>" />
        <input name="price" data-bvalidator="required" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $rowstock['price'] ?>" />
    </label>
    <br>
    <div>
        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium hidden">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>
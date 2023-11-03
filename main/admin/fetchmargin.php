<?php
include "../session.php";
$id = $_GET['hakuna'];
$margin = $obj->selectfieldwhere("users", "`limit`", 'id=' . $id . '');
$fund = $obj->selectfieldwhere("users", "`investmentamount`", 'id=' . $id . ''); ?>
<div class="col-6 mb-2">
    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400"> Fund</span>
        <input value="<?= $fund ?>" disabled class=" block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' />
    </label>
</div>
<div class="col-6 mb-2">

    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400"> Margin</span>
        <input name="margin" value="<?= $margin ?>" id="margin" readonly class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' />
    </label>
</div>
<?php
include "main/session.php";

?>
<style>
    .ui-autocomplete {
        position: absolute;
        z-index: 9999;
        width: auto;
        padding: 0.2em 0;
        margin: 0;
        list-style: none;
        background-color: #fff;
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
    }

    .ui-menu-item {
        padding: 0.2em 0.4em;
        cursor: pointer;
    }

    .ui-menu-item:hover {
        background-color: #f0f0f0;
    }

    .ui-state-focus {
        background-color: #ddd;
        color: #333;
    }
</style>
<form style="overflow-x: hidden;" id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insertaddstock', 'resultid', 'adduser');return 0;">
    <div class="mb-2"> <label for="Choose Client" class="block text-sm" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Select Client</span>

        </label>
        <select data-bvalidator="required" onchange="search(this.id,'getmargin','../main/admin/fetchmargin.php')" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="userid" id="Client Name">
            <option value="">Select Client</option>
            <?php
            $role = $obj->selectextrawhereupdate("users", "id,name", "status = 1 and type=2 and id != 26");
            $emprole = mysqli_fetch_all($role);
            foreach ($emprole as list($id, $name)) {  ?>
                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
            <?php
            } ?>
        </select>
    </div>
    <div class="mb-2"> <label for="Choose Client" class="block text-sm" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Trade By</span>

        </label>
        <select data-bvalidator="required" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="tradeby">
            <option value="">Select Type</option>
            <option value="Brocker">Advisor</option>
            <option value="AI">AI Mode</option>
        </select>
    </div>
    <div class="row">
        <div class="col-6 mb-2">
            <label for="buy" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
                <span class="text-gray-700 dark:text-gray-400">Exchange</span>

            </label>
            <select name="exchange" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' id="exch">
                <option value="">Select</option>
                <option value="N">NSE</option>
                <option value="B">BSE</option>
                <option value="M">MCX</option>
            </select>
        </div>

        <div class="col-6 mb-2">
            <label for="type" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
                <span class="text-gray-700 dark:text-gray-400">Exchange Mode</span>

            </label>
            <select name="exchtype" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' id="exchtype">
                <option value="">Select Type</option>
                <option value="C">Cash</option>
                <option value="D">Derivative</option>
                <option class="d-none" value="U">Currency</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mb-2">
            <label for="type" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
                <span class="text-gray-700 dark:text-gray-400">Type</span>

            </label>
            <select name="type" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' id="type">
                <option value="">Select Type</option>
                <option value="Intraday">Intraday</option>
                <option value="Holding">Holding</option>
            </select>
        </div>

        <div class="col-6 mb-2">
            <label for="buy" class="block text-sm" data-toggle="dropdown" style="margin-bottom: 5px;">
                <span class="text-gray-700 dark:text-gray-400">Buy/Sell</span>

            </label>
            <select name="trademethod" class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' id="sell">
                <option value="">Select Buy/Sell</option>
                <option value="Buy">Buy</option>
                <option value="Sell">Sell</option>
            </select>
        </div>
    </div>

    <label class="block text-sm" style="margin-bottom: 5px;">
       <div style="display: inline-flex;"> <span class="text-gray-700 dark:text-gray-400">Stock
            Name</span> <span class="col-2 profile-tooltip"><i style="color: #057c7c;" class="fa-solid fa-circle-info"></i> <p class="profile-tooltiptext">In case you search for Derivative, write like:<br>
<b>Option Type-</b> NIFTY 23 May 2023 PE 2345263.00<br>
[ STOCK Date of Expiry Option Type (PE/CE) Strike Price ]
<br><br>
<span><b>For Futures-</b> COPPER 23 May 2023<br>
[ STOCK Date of Expiry ]</span>
</p></span> </div>



        <input type="text" name="symbol" id="symbol" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Stock Name" data-bvalidator="required" />
    </label>

    

    
    <div class="row" id="getmargin">
        <div class="col-6 mb-2">
            <label class="block text-sm" style="margin-bottom: 5px;">
                <span class="text-gray-700 dark:text-gray-400"> Fund</span>
                <input class="disabled block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' />
            </label>
        </div>
        <div class="col-6 mb-2">
            <label class="block text-sm" style="margin-bottom: 5px;">
                <span class="text-gray-700 dark:text-gray-400"> Margin</span>
                <input name="margin" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' />
            </label>
        </div>
    </div>
    <div id="stockvalue" class="row">

        <label class=" col-6 block text-sm" for="Quantity">
            <span class="text-gray-700 dark:text-gray-400">Default Lot</span>
            <input data-bvalidator='required' name="lot" type="number" id="lot" onclick="this.select();" value='1' class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
        </label>

        <label class="col-6 block text-sm" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Lot/Quantity</span>
            <input type="number" id="qty" name="qty" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" data-bvalidator='required' placeholder="Enter Lot/Quality" />
        </label>

        <label class="col-6 block text-sm" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Buy/Sell Price(each)</span>
            <input name="price" id="shareprice" onkeyup="gettotalamt()" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Buy/Sell Price" data-bvalidator='required' />
        </label>
        <label class="col-6 block text-sm" style="margin-bottom: 5px;">
            <span class="text-gray-700 dark:text-gray-400">Total Amount</span>
            <input readonly name="totalamount" id="totalamt" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        </label>
    </div>


    <label class="block text-sm" style="margin-bottom: 5px;">
        <span class="text-gray-700 dark:text-gray-400">Date &
            Time</span>
        <input id="date" name="datetime" onfocus="datetimepicker(this.id)" class="block w-full  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Select Date & Time" data-bvalidator='required' />
    </label>

    <div>
        <button type="submit" id="modalsubmit" class="w-full px-3 py-1 mt-6 text-sm font-medium hidden">
            Submit
        </button>
    </div>
    <div id="resultid"></div>
</form>
<script>
    $('select').select2()
    $("#symbol").autocomplete({
        minLength: 3,
        source: function(request, response) {
            $.ajax({
                type: "post",
                url: "../main/admin/fetchsymbolsearch.php",
                data: {
                    search: request.term
                },
                dataType: "json",
                success: function(data) {
                    response(data)
                }
            });
        },
        select: function(event, ui) {
            event.preventDefault();
            $("#symbol").val(ui.item.value);
        },
    })

    $('#symbol').on('change', function() {
        $("#stockvalue").html()
        var stockName = $(this).val();
        var exch = $("#exch").val();
        var exchtype = $("#exchtype").val();
        $.ajax({
            url: '../main/admin/fetchsymbolprice.php',
            data: {
                stockName: stockName,
                exch: exch,
                exchtype: exchtype,
            },
            type: 'POST',
            success: function(response) {
                $("#stockvalue").html(response)
                // handle success response
            },
            error: function(xhr, status, error) {
                // handle error response
            }
        });
    });

    $('#exchtype').on('change', function() {
        $("#stockvalue").html()
        var stockName = $('#symbol').val();
        var exch = $("#exch").val();
        var exchtype = $(this).val();
        $.ajax({
            url: '../main/admin/fetchsymbolprice.php',
            data: {
                stockName: stockName,
                exch: exch,
                exchtype: exchtype,
            },
            type: 'POST',
            success: function(response) {
                $("#stockvalue").html(response)
                // handle success response
            },
            error: function(xhr, status, error) {
                // handle error response
            }
        });
    });

    $('#exch').on('change', function() {
        $("#stockvalue").html()
        var stockName = $('#symbol').val();
        var exch = $(this).val();
        var exchtype = $('#exchtype').val();
        $.ajax({
            url: '../main/admin/fetchsymbolprice.php',
            data: {
                stockName: stockName,
                exch: exch,
                exchtype: exchtype,
            },
            type: 'POST',
            success: function(response) {
                $("#stockvalue").html(response)
                // handle success response
            },
            error: function(xhr, status, error) {
                // handle error response
            }
        });
    });

    function gettotalamt() {
        qty = $('#qty').val()
        shareprice = $("#shareprice").val()
        lot = $("#lot").val()
        // margin = $("#margin").val()
        totalamt = parseFloat(lot) * parseFloat(qty) * parseFloat(shareprice)
        $("#totalamt").val(totalamt.toFixed(2))
    }
</script>
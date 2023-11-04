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
<form class="row gy-2 gx-3 align-items-end" id="addtax2">
    <span><span style="font-size: small;">In case you search for Derivative, write like: </span><span style="font-size: 12px;"><br>Eg: NIFTY 23 May 2023 PE 2345263.00<br><b>[</b> <span style="text-decoration-line: underline; margin-right: 3px;">STOCK</span><span style="text-decoration-line: underline;">Date of Expiry</span> <span style="text-decoration-line: underline; margin-left: 3px; margin-right: 3px;">Option Type (PE/CE)</span> <span style="text-decoration-line: underline;">Strike Price</span><b> ]</b> <br><div style="margin-top:5px;"><span style="font-size: small;">Explore Option chain and strike price: </span><br>For MCX Market <a target="_blank" style="color: #e75c5c; text-decoration-line: underline; " href="https://www.mcxindia.com/market-data/option-chain">click here</a> , <span style="margin-left: 10px;">For Equity / NIFTY <a target="_blank" style="color: #e75c5c; text-decoration-line: underline; " href="https://www.nseindia.com/option-chain">click here</a></div> </span></span> 
        <hr style="margin: 0; margin-top: 8px;">
    <div class="row -auto g-2 align-items-center">
        <div class="col-sm-9">
            <h6 style="margin-top: 0;">Search & Add Stocks</h6>
            <input class="form-control" data-bvalidator='required' id="symbol" type="text" placeholder="Enter Any Stock Symbol">
        </div>
        <div class="col-sm-9">
            <h5 class=" font-13">Exchange</h5>
            <div class="form-check d-inline-block me-2">
                <input class="form-check-input" checked value="N" type="radio" name="exch" id="exch1">
                <label class="form-check-label" for="exch1">
                    NSE
                </label>
            </div>
            <div class="form-check mb-2 d-inline-block ">
                <input class="form-check-input" value="B" type="radio" name="exch" id="exch2">
                <label class="form-check-label" for="exch2">
                    BSE
                </label>
            </div>
            <div class="form-check mb-2 d-inline-block">
                <input class="form-check-input" value="M" type="radio" name="exch" id="exch3">
                <label class="form-check-label" for="exch2">
                    MCX
                </label>
            </div>
        </div>
        <div class="col-sm-9">
            <h5 class=" font-13">Trade Mode</h5>
            <div class="form-check d-inline-block me-2">
                <input class="form-check-input" checked value="C" type="radio" name="trademode" id="trademode1">
                <label class="form-check-label" for="trademode1">
                    Cash
                </label>
            </div>
            <div class="form-check mb-2 d-inline-block ">
                <input class="form-check-input" value="D" type="radio" name="trademode" id="trademode2">
                <label class="form-check-label" for="trademode2">
                    Derivative
                </label>
            </div>
            <div class="form-check mb-2 d-inline-block d-none">
                <input class="form-check-input" value="U" type="radio" name="trademode" id="trademode3">
                <label class="form-check-label" for="trademode2">
                    Currency
                </label>
            </div>
        </div>
        <!-- <div class="col-sm-9">
            <input id="expiry" data-bvalidator="required" onfocus="datetimepicker(this.id)" class="form-control" placeholder="Expiry" />
        </div>
        <div class="col-sm-9">
            <input class="form-control" data-bvalidator='required' id="strikerate" value="0" type="text" placeholder="Enter Strike Rate">
        </div> -->
        <div class="col-sm-12">
            <button type="submit" onclick="searchsymbol()" class="btn btn-primary">Search</button>
        </div>
        <div id="returndata">

        </div>
        <div id="addstatus">

        </div>
    </div>
</form>
<script>
    $(function() {
        $("#modalfooterbtn").css('display', 'none')
    });

    function searchsymbol() {
        $('#returndata').html("")
        event.preventDefault();
        let sym = $("#symbol").val();
        // let strikerate = $("#strikerate").val();
        // let expiry = $("#expiry").val();
        var exchtype = $('input[name="trademode"]:checked').val();
        var exch = $('input[name="exch"]:checked').val();
        if (sym !== '') {
            sym = sym.toUpperCase()
            $.ajax({
                type: "POST",
                url: "main/getstocksymbol.php",
                data: {
                    symbol: sym,
                    // strikerate: strikerate,
                    // expiry: expiry,
                    exchtype: exchtype,
                    exch: exch
                },
                success: function(response) {
                    $("#returndata").html(response)
                    $("#symbol").css("border", "1px solid")
                }
            });
        } else {
            $("#symbol").css("border", "1px solid red")
        }
    }

    $("#symbol").autocomplete({
        minLength: 3,
        source: function(request, response) {
            $.ajax({
                type: "post",
                url: "main/fetchsymbolsearch.php",
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

    function addstock(exch, stockname, type, expiry, optiontype, strikerate, lotsize, token) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "main/adduserstock.php",
            data: {
                exch: exch,
                stockname: stockname,
                exchtype: type,
                expiry: expiry,
                optiontype: optiontype,
                strikerate: strikerate,
                lotsize: lotsize,
                token: token,
            },
            success: function(response) {
                console.log(response)
                if (response == 'Present') {
                    $("#addstatus").html("<div class='alert alert-warning'>Stock Already Added</div>")
                } else if (response == 'Success') {
                    $("#addstatus").html("<div class='alert alert-success'>Stock Added Successfully</div>")
                } else if (response == 'Failed') {
                    $("#addstatus").html("<div class='alert alert-danger'>Sorry! You can't add this stock.</div>")
                } else if (response == 'Limit Reached') {
                    $("#addstatus").html("<div class='alert alert-danger'>You cannot add more than 5 stock</div>")
                }
            }
        });
    }
</script>
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
    <div>
        <div>
            <div>
                <div>
                    <a class=" fw-medium" data-bs-toggle="collapse" href="#addStockHelp" role="button" aria-expanded="false" aria-controls="collapseExample">Need help in How to Search? <span class="fw-bold">Just click here</span></a>

                </div>
                <div class="collapse mt-2" id="addStockHelp" style="font-size: 12px;">Eg: NIFTY 23 May 2023 PE 2345263.00<br><b>[</b> <span style="text-decoration-line: underline; margin-right: 3px;">STOCK</span><span style="text-decoration-line: underline;">Date of Expiry</span> <span style="text-decoration-line: underline; margin-left: 3px; margin-right: 3px;">Option Type (PE/CE)</span> <span style="text-decoration-line: underline;">Strike Price</span><b> ]</b> <br>
                    <div style="margin-top:5px;"><span style="font-size: small;">Explore Option chain and strike price: </span><br>For MCX Market <a target="_blank" style="color: #e75c5c; text-decoration-line: underline; " href="https://www.mcxindia.com/market-data/option-chain">click here</a> , <span style="margin-left: 10px;">For Equity / NIFTY <a target="_blank" style="color: #e75c5c; text-decoration-line: underline; " href="https://www.nseindia.com/option-chain">click here</a></span></div>
                    <hr>
                </div>
                <div class="row mb-4 mt-4">
                    <div class="col-lg-6 col-sm-12">
                        <small class="text-light fw-medium d-block mb-1" style="color: #435971 !important;">EXCHANGE</small>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" checked value="N" type="radio" name="exch" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">NSE</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="B" type="radio" name="exch" id="inlineRadio2" value="option3">
                            <label class="form-check-label" for="inlineRadio2">BSE</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="M" type="radio" name="exch" id="inlineRadio3" value="option2">
                            <label class="form-check-label" for="inlineRadio3">MCX</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 margin-for-mob">
                        <small class="text-light fw-medium d-block mb-1" style="color: #435971 !important;">TRADE MODE</small>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" checked value="C" type="radio" name="trademode" id="trademode1" value="option4">
                            <label class="form-check-label" for="inlineRadio4">Cash</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="D" type="radio" name="trademode" id="trademode2" value="option5">
                            <label class="form-check-label" for="inlineRadio5">Derivative</label>
                        </div>
                    </div>
                </div>


                <div class="row g-2 mb-2">
                    <div class="col-10 mb-0 mt-0">
                        <label for="stock" class="form-label mb-0">Search & Add Stock</label>
                        <div class="input-group input-group-merge speech-to-text">

                            <input style="text-transform: uppercase;" type="text" class="form-control" id="symbol" placeholder="Enter or Say it">
                            <span class="input-group-text" id="startButton">
                                <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                            </span>
                        </div>
                        <script>
        const startButton = document.getElementById('startButton');

        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
        recognition.lang = 'en-IN';

        recognition.onstart = () => {
            // Change the button content to a spinning microphone icon
            startButton.innerHTML = '<i style="transform: scaleX(-1);" class="bx bx-user-voice"></i>';
        };

        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript;
            document.querySelector('input[type="text"]').value = transcript;
        };

        recognition.onend = () => {
            // Restore the original microphone icon
            startButton.innerHTML = '<i class="bx bx-microphone"></i>';
        };

        startButton.addEventListener('click', () => {
            recognition.start();
        });
    </script>



                    </div>
                    <div class="col-2 mb-0 mt-0"> <label for="stock" class="form-label mb-0">Srch.</label><button onclick="searchsymbol()" type="button" class="btn btn-outline-primary" style="width: 100%;"><i class='bx bx-search-alt'></i></button></div>

                </div>
                <div id="returndata">

                </div>
                <div id="addstatus">

                </div>
            </div>
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
                    $("#addstatus").html("<div class='alert alert-warning'>Stock Already Added!</div>")
                } else if (response == 'Success') {
                    $("#addstatus").html("<div class='alert alert-success'>Stock Added Successfully</div>")
                } else if (response == 'Failed') {
                    $("#addstatus").html("<div class='alert alert-danger'>Invalid stock details provided; please check the entered Exchange, Trade Mode or Stock Name!</div>")
                } else if (response == 'Limit Reached') {
                    $("#addstatus").html("<div class='alert alert-danger'>You cannot add more than 50 stock</div>")
                }
            }
        });
    }
</script>
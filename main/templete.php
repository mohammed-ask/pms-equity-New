<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "headincludes.php"; ?>
</head>
<style>
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8) url(main/images/loader.gif) no-repeat center center;
        z-index: 10000;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<body data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
    <script src="main/dist/userjs/demo-theme.min.js.download"></script>
    <!-- Top Bar Start -->
    <div class="page">

        <?php include "header.php"; ?>
        <!-- Top Bar End -->
        <div class="page-wrapper">
            <!--end row-->
            <?php echo $pagemaincontent ?>

            <!-- Footer Start -->
            <?php include "footer.php" ?>
            <!-- end Footer -->

        </div>
        <!-- end page content -->
    </div>
    <script src="main/dist/userjs/global-wizard.min.js.download" defer=""></script>
    <script src="main/dist/userjs/demo.min.js.download" defer=""></script>
    <!-- <div class="modal fade" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0 mb-n1" id="modalheading">Add Service Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modaldata">
                </div>
                <div class="p-3">
                    <button type="button" class="btn btn-success w-10 my-3" id="modalfooterbtn" onclick="$('#modalsubmit').click();">Submit</button>
                   
                </div>
            </div>
        </div>
    </div> -->


    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-hidden="true" style="display: none;" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalheading">Modal Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modaldata">

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button id="modalfooterbtn" onclick="$('#modalsubmit').click();" class="btn btn-primary ms-auto">
                        Submit
                    </button>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-success">Send Payment Details For Approval</button>
                
                </div> -->
            </div>
        </div>
    </div>

    <!-- Javascript  -->

    <?php include "footerincludes.php"
    ?>




</body><!--end body-->

</html>
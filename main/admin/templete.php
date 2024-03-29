<!DOCTYPE html>
<?php
$unreadmail = $obj->selectfieldwhere("mail", "count(id)", "receiverid =" . $employeeid . " and readstatus = 0");
$pendinguser = $obj->selectfieldwhere("users", "count(id)", "status =0");
$pendingfund = $obj->selectfieldwhere("fundrequest", "count(id)", "status =0");
$todayaitraders = $obj->selectfieldwhere("aitraders", "count(id)", "status =1");
$withdrawpending = $obj->selectfieldwhere("withdrawalrequests", "count(id)", "status =0");
?>
<html lang="en">

<head>
    <?php include 'headincludes.php'; ?>
    <style>
        .card-tools {
            margin-left: auto;
        }

        .select2-container {
            z-index: 9999;
        }

        /* ::-webkit-scrollbar {
            width: 4px;
            height: 2px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: lightblue;
            border-radius: 10px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .item-class td {
            padding: 5px;
        }

        .select2 {
            width: 100% !important;
        }

        .sidebyside {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .select2-container--default .select2-selection--single {
            padding: 5px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 22px;
        } */

        /* body {
            font-family: 'cursive';
        } */
    </style>
</head>

<body data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
    <script src="../main/dist/userjs/demo-theme.min.js.download"></script>
    <div class="page">

        <!-- Navbar -->
        <?php include 'sidebar.php'; ?>
        <!-- /.navbar -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" style="position: sticky; top: 0; z-index: 1; background-color: transparent; box-shadow: none;">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex" style="margin-top: 5px; margin-right:-5px;">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                            </svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
                            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                            </svg>
                        </a>

                    </div>


                    <div class="nav-item dropdown mx-2">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0 mt-1" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path d="M12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22zm7-7.414V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v4.586l-1.707 1.707A.996.996 0 0 0 3 17v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-1a.996.996 0 0 0-.293-.707L19 14.586z"></path>
                            </svg>
                            <?php if ($unreadmail > 0 || $pendinguser > 0 || $pendingfund > 0 || $todayaitraders > 0) { ?>
                                <span class="badge bg-red"></span>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a class="items-center dropdown-item" style="justify-content: space-between;" href="aitraders">
                                <span>AI Traders</span>
                                <span class="flex items-center justify-center norti-bell-no"> <?= $todayaitraders ?> </span>
                            </a>

                            <a class="items-center dropdown-item" style="justify-content: space-between;" href="pendingapproval">
                                <span>User Approval</span>
                                <span class="flex items-center justify-center norti-bell-no"> <?= $pendinguser ?> </span>
                            </a>
                            <a class="items-center dropdown-item" style="justify-content: space-between;" href="allinvestment">
                                <span>Payment Approval</span>
                                <span class="flex items-center justify-center norti-bell-no"> <?= $pendingfund ?> </span>
                            </a>
                            <a class="items-center dropdown-item" style="justify-content: space-between;" href="withdrawalrequest">
                                <span>Withdrawal Request</span>
                                <span class="flex items-center justify-center norti-bell-no"> <?= $withdrawpending ?> </span>
                            </a>
                            <a class="items-center dropdown-item" style="justify-content: space-between;" href="viewinbox">
                                <span>Received Mail</span>
                                <span class="flex items-center justify-center norti-bell-no"> <?= $unreadmail ?> </span>
                            </a>

                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url(../main/images/user.png)"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a data-bs-toggle="modal" data-bs-target="#modal-report" onclick='dynamicmodal("none", "adminprofile", "", "Admin Profile")' class="dropdown-item">Profile</a>
                            <a href="logout" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div>
                    </div>
                </div>

            </div>
        </header>
        <div class="page-wrapper">
            <!-- Small boxes (Stat box) -->
            <?php echo $pagemaincontent; ?>
            <!-- /.row (main row) -->
        </div>
    </div>
    <?php //include 'footer.php';
    ?>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalheading">New report</h5>
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
            </div>
        </div>
    </div>
    <!-- Tabler Core -->
    <script src="../main/dist/userjs/global-wizard.min.js.download" defer=""></script>
    <script src="../main/dist/userjs/demo.min.js.download" defer=""></script>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->

    <!-- ./wrapper -->
    <?php include 'footerincludes.php'; ?>
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
        // $(document).ready(function() {
        //     setTimeout(function() {
        //         $('main').append('<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"><div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="" @keydown.escape="closeModal" class="w-full px-2 mx-1 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="Modal"><header class="flex justify-end"><button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal"><svg class="w-4 h-4 mt-3" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg></button></header><div class=" adduserform mb-1 mt-1"><div class="container px-0 mx-auto grid"><h6 style="text-align: center;" id="modalheading" class="mb-4 mx-4 text-md font-semibold text-gray-600 dark:text-gray-300"></h6><div class="px-3 py-2 bg-white rounded-lg dark:bg-gray-800" id="modaldata"></div><div class="modal-footer"><button onclick="$(\'#modalsubmit\').click();" id="modalfooterbtn" type="button" class="w-full px-3 py-1 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button></div></div></div></div></div>');
        //     }, 1000);
        // });
    </script>
    <!-- jQuery -->
</body>

</html>
<?php
include "main/session.php";
ob_start();
$plan = $obj->selectextrawhere("plan", "status =1");

?>
<div class="page-body">
    <div class="container-xl">

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-home-3" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path>
                                <path d="M13.5 6.5l4 4"></path>
                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M19.001 15.5v1.5"></path>
                                <path d="M19.001 21v1.5"></path>
                                <path d="M22.032 17.25l-1.299 .75"></path>
                                <path d="M17.27 20l-1.3 .75"></path>
                                <path d="M15.97 17.25l1.3 .75"></path>
                                <path d="M20.733 20l1.3 .75"></path>
                            </svg> Compose Mail</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-profile-3" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path>
                                <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path>
                                <path d="M3 19l6 -6"></path>
                                <path d="M15 13l6 6"></path>
                            </svg>Inbox</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-activity-5" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11 19h-6a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v6"></path>
                                <path d="M3 7l9 6l9 -6"></path>
                                <path d="M15 19l2 2l4 -4"></path>
                            </svg>Sent</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-home-3" role="tabpanel">
                        <h4 class="mt-3">Send Message To Global Wizard Team</h4>
                        <form class="row gy-2 gx-3 align-items-end" id="addtax" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input name="userid" data-bvalidator="required" class="d-none" value='59' placeholder="Subject" />
                                <label class="form-label">Subject</label>
                                <input type="text" data-bvalidator="required" class="form-control" name="subject" placeholder="Message subject" fdprocessedid="vsy1l">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message<span class="form-label-description"></label>
                                <textarea class="form-control" data-bvalidator="required" name="message" rows="8" placeholder="Type your message"></textarea>
                            </div>
                            <div class="mb-5 col-lg-4 col-md-6">
                                <div class="form-label">Attach File</div>
                                <input name="files[]" multiple data-bvalidator="extension[jpg:jpeg:png:pdf:word]" data-bvalidator-msg-extension="This File Format Not Allowed" type="file" class="form-control">
                            </div>
                            <!-- <a class="btn btn-green w-35" href="#">
                                Send Message
                            </a> -->
                        </form>
                        <button style="background-color: #0054a6;" class="btn btn-success w-10 py-2 my-3" onclick="sendForm('', '', 'insertmail', 'resultid', 'addtax')">Send Message</button>
                        <div class="col-md-12" id="resultid"></div>
                    </div>
                    <div class="tab-pane" id="tabs-profile-3" role="tabpanel">
                        <div class="col-12 d-flex flex-column">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="m-0">Messsages Received from Global Wizard Team</h4>
                                    </div>

                                    <div class="table-responsive fixTableHead" style="height: 370px;">
                                        <table id="example1" class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Subject</th>
                                                    <th>View Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-activity-5" role="tabpanel">
                        <div class="col-12 d-flex flex-column">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="m-0">Messsages Sent to Global Wizard Team</h4>
                                    </div>

                                    <div class="table-responsive fixTableHead" style="height: 370px;">
                                        <table id="example2" class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Subject</th>
                                                    <th>View Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();

$pagemeta = "";
$pagetitle = "Your Email-";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script>
    $(function() {
        $('#example1').DataTable({
            "ajax": "main/inboxdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "order": [
                [0, "desc"]
            ],
            columnDefs: [{
                render: function(data, type, full, meta) {
                    return "<div class='text-wrap width-200 bg-red'>" + data + "</div>";
                },
                targets: 4,
                visible: false,
            }],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                console.log(aData)
                if (aData[4] == 1) {

                } else {
                    $('td', nRow).attr('style', 'background-color: rgb(199, 255, 255) !important');
                }
            },
        });

        $('#example2').DataTable({
            "ajax": "main/sentmaildata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 100,
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "order": [
                [0, "desc"]
            ],
        })

        function recalculateDataTableResponsiveSize() {
            $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
        }

        $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
            recalculateDataTableResponsiveSize();
            // var id = $(e.target).attr("href").substr(1);
            // window.location.hash = id;
        });

    });
</script>
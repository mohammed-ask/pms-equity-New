<?php
include "session.php";
ob_start();
$sid = "";
if (isset($_POST['hakuna'])) {
    $sid = $_POST['hakuna'];
}
$email = $obj->selectfieldwhere("users", 'email', "id=$employeeid");
$resultinbox = $obj->selectextrawhereupdate("mail", "*", "status = 1 and receiverid = $employeeid");
$resultsentmail = $obj->selectextrawhereupdate("mail", "*", "status = 1 and senderid = $employeeid ");

?>
<div class="app-email card">
    <div class="border-0">
        <div class="row g-0">


            <!-- Emails List -->
            <div class="col app-emails-list">
                <div class="card shadow-none border-0">
                    <div class="card-body emails-list-header p-3 py-lg-3 py-2" style="padding-bottom: 4px !important">
                        <!-- Email List: Search -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center w-100">

                                <div class="mb-0 mb-lg-2 w-100">
                                    <div class="input-group input-group-merge shadow-none">
                                        <span class="input-group-text border-0 ps-0 py-0" id="email-search">
                                            <i class="bx bx-search fs-4 text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control email-search-input border-0 py-0" placeholder="Search mail" aria-label="Search..." aria-describedby="email-search">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <hr class="mx-n3 emails-list-header-hr"> -->
                    </div>

                    <hr class="container-m-nx m-0">

                    <!-- Email List: Items -->


                    <div class="nav-align-top mt-2 ">
                        <ul class="nav nav-pills mb-2 nav-fill mx-3 custom-width" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-inbox" aria-controls="navs-pills-justified-home" aria-selected="true">
                                    <span class="d-sm-block">Inbox</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-sent" aria-controls="navs-pills-justified-profile" aria-selected="false">
                                    <span class="d-sm-block">Sent</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-compose" aria-controls="navs-pills-justified-profile" aria-selected="false">
                                    <span class="d-sm-block">Compose</span>
                                </button>
                            </li>

                        </ul>
                        <hr class="my-0">
                        <div class="tab-content p-0">


                            <div class="tab-pane fade show active" id="navs-pills-justified-inbox" role="tabpanel">

                                <div class="email-list pt-0 ps ps--active-y">
                                    <?php
                                    while ($rowinbox = $obj->fetch_assoc($resultinbox)) { ?>
                                        <ul class="list-unstyled m-0">
                                            <li class="email-list-item email-marked-read" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd<?= $rowinbox['id'] ?>" aria-controls="offcanvasEnd<?= $rowinbox['id'] ?>">

                                                <div class="d-flex align-items-center">


                                                    <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                                                        <span class="email-list-item-username me-2 h6">Eagle Eye Trading</span>
                                                        <span class="email-list-item-subject d-xl-inline-block d-block"> <?= $rowinbox['message'] ?></span>
                                                    </div>

                                                    <div class="email-list-item-meta ms-auto d-flex align-items-center">

                                                        <small class="email-list-item-time text-muted"> <span><?= changedateformatespecito($rowinbox['added_on'], "Y-m-d H:i:s", "d,M y") ?></span></small>


                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd<?= $rowinbox['id'] ?>" aria-labelledby="offcanvasEndLabel<?= $rowinbox['id'] ?>">
                                            <div class="offcanvas-header">
                                                <h5 id="offcanvasEndLabel" class="offcanvas-title">Message</h5>
                                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body my-auto mx-0 flex-grow-0">

                                                <div class="p-0">

                                                    <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                                        <label for="email-subject" class="form-label mb-0 py-2">From: <span style="margin-left: 7px;"> Eagle Eye Tradings</span></label>

                                                    </div>

                                                    <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                                        <label for="email-subject" class="form-label mb-0">Subject:</label>
                                                        <input type="text" value="<?= $rowinbox['subject'] ?>" class="form-control border-0 shadow-none flex-grow-1 mx-2 px-0" id="email-subject">
                                                    </div>
                                                    <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                                        <textarea class="form-control border-0 shadow-none flex-grow-1 px-0" id="exampleFormControlTextarea1" placeholder="Message..." rows="8"><?= $rowinbox['message'] ?></textarea>
                                                    </div>

                                                    <label style="width: 100%;" for="View"><i class="bx bx-paperclip cursor-pointer ms-2"></i> Attachments</label>
                                                    <!-- <input type="file" name="file-input" class="d-none" id="attach-file"> -->
                                                    <div class="email-compose-actions d-flex justify-content-between align-items-center my-2 py-1">

                                                        <?php
                                                        $rowmail = $obj->selectextrawhere("mail", "id=" . $rowinbox['id'] . "")->fetch_assoc();
                                                        $attachment = $obj->selectextrawhere('maildocuments', "mailid=" . $rowinbox['id'] . "");
                                                        while ($rowattachment = $obj->fetch_assoc($attachment)) {
                                                            $path = $obj->selectfieldwhere("uploadfile", "path", "id=" . $rowattachment['path'] . "");
                                                            $orgname = $obj->selectfieldwhere("uploadfile", "orgname", "id=" . $rowattachment['path'] . "");
                                                        ?>
                                                            <a target="_blank" class="w-full my-3 px-3 py-1 rounded-lg text-sm font-medium bg-theme-mail-attachments" href="<?= $path ?>"><?= $orgname ?></a>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>


                                </div>





                            </div>


                            <div class="tab-pane fade" id="navs-pills-justified-sent" role="tabpanel">

                                <div>
                                    <div class="email-list pt-0 ps ps--active-y">
                                        <?php
                                        while ($rowsent = $obj->fetch_assoc($resultsentmail)) { ?>
                                            <ul class="list-unstyled m-0">
                                                <li class="email-list-item email-marked-read" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd<?= $rowsent['id'] ?>" aria-controls="offcanvasEnd<?= $rowsent['id'] ?>">
                                                    <div class="d-flex align-items-center">
                                                        <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                                                            <span class="email-list-item-username me-2 h6"><?= $obj->selectfieldwhere('users', 'name', 'id=' . $rowsent['senderid'] . '') ?></span>
                                                            <span class="email-list-item-subject d-xl-inline-block d-block"> <?= $rowsent['message'] ?></span>
                                                        </div>
                                                        <div class="email-list-item-meta ms-auto d-flex align-items-center">
                                                            <small class="email-list-item-time text-muted"> <span><?= changedateformatespecito($rowsent['added_on'], "Y-m-d H:i:s", "d,M y") ?></span></small>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd<?= $rowsent['id'] ?>" aria-labelledby="offcanvasEndLabel<?= $rowsent['id'] ?>">
                                                <div class="offcanvas-header">
                                                    <h5 id="offcanvasEndLabel" class="offcanvas-title">Message</h5>
                                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body my-auto mx-0 flex-grow-0">

                                                    <div class="p-0">

                                                        <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                                            <label for="email-subject" class="form-label mb-0 py-2">From: <span style="margin-left: 7px;"> You </span></label>

                                                        </div>

                                                        <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                                            <label for="email-subject" class="form-label mb-0">Subject:</label>
                                                            <input type="text" value="<?= $rowsent['subject'] ?>" class="form-control border-0 shadow-none flex-grow-1 mx-2 px-0" id="email-subject">
                                                        </div>
                                                        <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                                            <textarea class="form-control border-0 shadow-none flex-grow-1 px-0" id="exampleFormControlTextarea1" placeholder="Message..." rows="8"><?= $rowsent['message'] ?></textarea>
                                                        </div>

                                                        <label style="width: 100%;" for="View"><i class="bx bx-paperclip cursor-pointer ms-2"></i> Attachments</label>
                                                        <!-- <input type="file" name="file-input" class="d-none" id="attach-file"> -->
                                                        <div class="email-compose-actions d-flex justify-content-between align-items-center my-2 py-1">

                                                            <?php
                                                            $rowmail = $obj->selectextrawhere("mail", "id=" . $rowsent['id'] . "")->fetch_assoc();
                                                            $attachment = $obj->selectextrawhere('maildocuments', "mailid=" . $rowsent['id'] . "");
                                                            while ($rowattachment = $obj->fetch_assoc($attachment)) {
                                                                $path = $obj->selectfieldwhere("uploadfile", "path", "id=" . $rowattachment['path'] . "");
                                                                $orgname = $obj->selectfieldwhere("uploadfile", "orgname", "id=" . $rowattachment['path'] . "");
                                                            ?>
                                                                <a target="_blank" class="w-full my-3 px-3 py-1 rounded-lg text-sm font-medium bg-theme-mail-attachments" href="<?= $path ?>"><?= $orgname ?></a>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>


                                </div>

                            </div>

                            <div class="tab-pane fade" id="navs-pills-justified-compose" role="tabpanel">
                                <form id="addtax" enctype="multipart/form-data">
                                    <div class="px-3">
                                        <input name="userid" data-bvalidator="required" class="d-none" value='1' placeholder="Subject" />
                                        <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                            <label for="email-subject" class="form-label mb-0 py-2">To: <span style="margin-left: 7px;"> Eagle Eye Tradings Team </span></label>

                                        </div>

                                        <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                            <label for="email-subject" class="form-label mb-0">Subject:</label>
                                            <input type="text" data-bvalidator="required" name="subject" class="form-control border-0 shadow-none flex-grow-1 mx-2 px-0">
                                        </div>


                                        <div class="email-compose-subject d-flex align-items-center my-1" style="border-bottom: 1px solid lightgray;">
                                            <textarea class="form-control border-0 shadow-none flex-grow-1 px-0" id="exampleFormControlTextarea1" data-bvalidator="" name="message" placeholder="Message..." rows="10"></textarea>
                                        </div>



                                        <div class="email-compose-actions d-flex justify-content-between align-items-center my-2 py-1">
                                            <div class="d-flex align-items-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-primary" onclick="sendForm('', '', 'insertmail', 'resultid', 'addtax')">Send</a>

                                                </div>
                                                <label for="attach-file"><i class="bx bx-paperclip cursor-pointer ms-2"></i> Attachment</label>
                                                <input type="file" name="file-input" class="d-none" id="attach-file" multiple name="files[]" data-bvalidator="extension[jpg:jpeg:png:pdf:word]" data-bvalidator-msg-extension="This File Format Not Allowed">
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /Emails List -->
        </div>
    </div>
</div>
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "E-Mail Support- PMS Equity";
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
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [
                [0, "desc"]
            ],
            columnDefs: [{
                render: function(data, type, full, meta) {
                    return "<div class='text-wrap width-200 bg-red'>" + data + "</div>";
                },
                targets: 2,
                visible: false,
            }],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // console.log(aData)
                if (aData[2] == 1) {

                } else {
                    $('td', nRow).attr('style', 'background-color: rgb(199, 255, 255) !important');
                }
            },
        });

        $('#example2').DataTable({
            "ajax": "main/sentmaildata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
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
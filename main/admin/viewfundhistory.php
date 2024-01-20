<?php
include "main/session.php";
/* @var $obj db */
ob_start();
$id = $_GET['hakuna'];

?>
<div class="page-body">
    <div class="container-xl">

        <div class="flex" style="text-align: right">
            <buttonv data-bs-toggle='modal' data-bs-target='#modal-report' onclick='dynamicmodal("<?= $id ?>", "addinvestmentamount", "", "Add Fund")' class="btn btn-primary py-2">
                + Add Fund
                </button>

        </div>

        <div class="card card-default">
            <div class="card-header">
                <h3>Users List</h3>

            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example2" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">S.No.</th>
                                <th class="px-4 py-3">User Name</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Mobile</th>
                                <th class="px-4 py-3">Transaction ID</th>
                                <th class="px-4 py-3">Payment Method</th>
                                <th class="px-4 py-3">Date & Time</th>
                                <!-- <th class="px-4 py-3">Action</th> -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y text-s dark:divide-gray-700 dark:bg-gray-800">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Eagle Eye Tradings: Investment Log";
$contentheader = "";
$pageheader = "";
include "main/admin/templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/fundhistorydata.php?hakuna=<?= $id ?>",
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
            ]
        });
    });

    // $('.sms1').click(() => {
    //     alert('yoyo')
    //     alert($(this).val())
    // })

    $(document).on("click", ".setactive", function() {
        value = $(this).val();
        id = $(this).data("id");
        type = $(this).data("type");
        $.ajax({
            type: "post",
            url: "main/setactivation.php",
            data: {
                value: value,
                id: id,
                type: type
            },
            success: function(response) {
                if (response == 'Success') {
                    location.reload(true);
                }
            }
        });
        // sendForm('id', [id, decision], 'edit_indent_approve.php', 'resultid', 'indentdec');

    })
</script>
<?php
include "main/session.php";
/* @var $obj db */
ob_start();
if (!in_array(12, $permissions)) {
    header("location:index");
}
?>
<div class="page-body">
    <div class="container-xl">

        <div class="mb-3" style="text-align: right;">
            <?php if (in_array(9, $permissions)) { ?>
                <button data-bs-toggle='modal' data-bs-target='#modal-report' onclick='dynamicmodal("none", "addemployee", "", "Add Employee")' class="btn btn-primary py-2">
                    + Add Employee
                </button>
            <?php } ?>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3>Employee Details</h3>

            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">

                <div class="w-full ">

                    <table id="example2" class="table w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-3 py-2">S.No.</th>
                                <th class="px-3 py-2">User Name</th>
                                <th class="px-3 py-2">Emp ID</th>
                                <th class="px-3 py-2">Mob No.</th>
                                <th class="px-3 py-2">Email</th>
                                <th class="px-3 py-2">Role</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">Action</th>
                                <th class="px-3 py-2">Clients</th>
                            </tr>
                        </thead>
                        <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<?php
//Assign all Page Specific variables
$pagemaincontent = ob_get_contents();
ob_end_clean();
$pagemeta = "";
$pagetitle = "Eagle Eye Tradings";
$contentheader = "";
$pageheader = "";
include "templete.php";
?>
<script>
    $(function() {
        $('#example2').DataTable({
            "ajax": "../main/admin/employeelistdata.php",
            "processing": true,
            "serverSide": true,
            "pageLength": 150,
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
    $(document).on("click", ".setactive", function() {
        value = $(this).val();
        id = $(this).data("id");
        type = $(this).data("type");
        $.ajax({
            type: "post",
            url: "../main/admin/setactivation.php",
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
    $(document).on('click', '#eye', () => {
        iconname = $("#eye").attr("class");
        if (iconname === 'fa fa-eye') {
            $('#password').attr('type', 'text')
            $("#eye").attr('class', 'fa fa-eye-slash')

        } else {
            $('#password').attr('type', 'password')
            $("#eye").attr('class', 'fa fa-eye')
        }
    })
</script>
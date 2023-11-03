<?php
include "main/session.php";
?>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">
          Account Settings
        </h2>
      </div>
    </div>
  </div>
</div>
<!-- Page body -->
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="row g-0">
        <div class="col-12 col-md-3 border-end">
          <div class="card-body">
            <h4 class="subheader">Account settings</h4>
            <div class="list-group list-group-transparent">
              <a href="account" class="list-group-item list-group-item-action d-flex align-items-center">My Account</a>

              <a href="plan" class="list-group-item list-group-item-action d-flex align-items-center ">Active Plan</a>
              <a href="transaction" class="list-group-item list-group-item-action d-flex align-items-center active">Recent Transactions</a>
            </div>

          </div>
        </div>
        <div class="col-12 col-md-9 d-flex flex-column">

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Transactions</h3>
              </div>

              <div class="table-responsive fixTableHead" style="height: 400px;">
                <table id="example1" class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Transaction Id</th>
                      <th>Payment Mode</th>
                      <th>Amount</th>
                      <th>Status</th>
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

<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();

$pagemeta = "";
$pagetitle = "Your Transaction- Global Wizard";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script>
  var table = $('#example1').DataTable({
    "ajax": "./main/paymentdata.php",
    "processing": false,
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
  })
</script>
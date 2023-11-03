<?php
include "main/session.php";
$plan = $obj->selectextrawhere("plan", "status =1 and (planfor='Universal' or FIND_IN_SET('$employeeid', userid))");
$activeplan = $obj->selectextrawhereupdate('subscribers inner join plandetail on plandetail.id = subscribers.plandetailid inner join plan on plan.id = plandetail.planid inner join plantypes on plantypes.id = plandetail.plantypeid', "subscribers.id,subscribers.expireon,subscribers.added_on,plan.name,plantypes.name as pname,subscribers.status", "subscribers.userid=$employeeid and subscribers.status = 1")->fetch_assoc();
$curdate = date('Y-m-d');
if (!empty($activeplan) && $curdate > $activeplan['expireon']) {
  $obj->delete("subscribers", $activeplan['id']);
  header('location:dashboard');
}
?>

<div class="d-lg-none mt-2" style="text-align: center;">
  <div>
  <?php
                    if (empty($pstatus) && empty($paypending) && $membershipstatus === 'No') { ?>
                        <a data-bs-toggle="offcanvas" href="#offcanvasEnd99" role="button" aria-controls="offcanvasEnd99" class="btn py-2" target="_blank" rel="noreferrer">
                            <!-- Download SVG icon from    -->
                            <svg xmlns="http://www.w3.org/2000/svg" style="color: #db0b0b; stroke-width: 2px;" class="icon icon-tabler icon-tabler-shield-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17.67 17.667a12 12 0 0 1 -5.67 3.333a12 12 0 0 1 -8.5 -15c.794 .036 1.583 -.006 2.357 -.124m3.128 -.926a11.997 11.997 0 0 0 3.015 -1.95a12 12 0 0 0 8.5 3a12 12 0 0 1 -1.116 9.376"></path>
                                <path d="M3 3l18 18"></path>
                            </svg>
                            Activate Your Account
                        </a>
                    <?php } elseif (!empty($pstatus) || $membershipstatus === 'Yes') { ?>
                        <a class="btn py-2" target="_blank" rel="noreferrer">

                            <svg xmlns="http://www.w3.org/2000/svg" style="color: green; stroke-width: 2px;" class="icon icon-tabler icon-tabler-shield-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11.143 20.743a12 12 0 0 1 -7.643 -14.743a12 12 0 0 0 8.5 -3a12 12 0 0 0 8.5 3c.504 1.716 .614 3.505 .343 5.237"></path>
                                <path d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z"></path>
                            </svg>
                            Account is Active
                        </a>
                    <?php } elseif (!empty($paypending)) { ?>
                        <a role="button" class="btn py-2" target="_blank" rel="noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" style="color: #fed000; stroke-width: 2px;" class="icon icon-tabler icon-tabler-clock-exclamation" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M20.986 12.502a9 9 0 1 0 -5.973 7.98"></path>
   <path d="M12 7v5l3 3"></path>
   <path d="M19 16v3"></path>
   <path d="M19 22v.01"></path>
</svg>
                        
                            Pending for Activation
                        </a>
                    <?php } ?>
  </div>
</div>





<div class="page-body">
  <div class="container-xl">
    <div class="card">

      <div class="card-body">
        <div>
          <h2 class="m-0" style="text-align: left; color: #0117a1; text-decoration-line: underline;">
            Plans & Subscriptions
          </h2>
        </div>
        <div class="page-header d-print-none mt-2">

          <div class="row g-2 align-items-center">
            <?php
            if (!empty($activeplan)) { ?>
              <div class="col">
                <h4 class="card-title m-0">
                  <?= $activeplan['name'] ?>
                </h4>
                <div style="color: gray; font-weight: 500;">
                  <?= $activeplan['pname'] ?>
                </div>
                <div class="text-secondary bill-date">
                  Billed on - <?= changedateformatespecito($activeplan['added_on'], "Y-m-d H:i:s", "d M Y") ?>
                </div>
                <div class="small mt-1">
                  <span style="margin-right: 10px;">Status</span> <span class="badge bg-green"></span> Active
                </div>
              </div>
            <?php } else { ?>
              <div class="col">
                <h4 class="card-title m-0">
                  No active plan right now
                </h4>
                <div style="color: gray; font-weight: 500;">

                </div>
                <div class="text-secondary bill-date">

                </div>
                <div class="small mt-1">
                  <span style="margin-right: 10px;">Status</span> <span class="badge bg-danger"></span> Inactive
                </div>
              </div>
            <?php } ?>
            <div class="col-auto">
              <a href="plan" class="btn">
                Details
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title" style="color: #0117a1;">
            Membership Plans & Pricing
          </h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Page body -->
  <div class="page-body">

    <div class="container-xl">
      <div class="row row-cards">
        <?php
        while ($rowplan = $obj->fetch_assoc($plan)) {
          $monthlyplan = $obj->selectextrawhere("plandetail", "planid=" . $rowplan['id'] . " and plantypeid=1 and status = 1")->fetch_assoc(); ?>
          <div class="col-sm-6 col-lg-4 px-3">
            <div class="card card-md">
              <div class="card-body text-center">
                <div class="text-uppercase text-secondary font-weight-medium mb-3"><?= $rowplan['name'] ?></div>
                <p class="m-0" style="    color: green; font-weight: 600;">Starting From</p>
                <div class="display-5 fw-bold mb-3">₹<?= round($monthlyplan['price'], 0) ?></div>
                <table class="table table-sm table-borderless">
                  <!-- <thead>
                        <tr>
                          <th>Page</th>
                          <th class="text-end">Visitors</th>
                        </tr>
                      </thead> -->
                  <tbody>
                    <?php
                    $plantype = $obj->selectextrawhere("plandetail", "planid=" . $rowplan['id'] . "");
                    while ($rowplandetail = $obj->fetch_assoc($plantype)) {

                    ?>

                      <tr>

                        <td>

                          <div class="progressbg">
                            <div class="progress progressbg-progress">
                              <div class="progress-bar" style="width: 85%; border-radius: 3px;" role="progressbar" aria-valuenow="82.54" aria-valuemin="0" aria-valuemax="100" aria-label="82.54% Complete">
                                <span class="visually-hidden">82.54% Complete</span>
                              </div>
                            </div>
                            <div class="progressbg-text"><?= $obj->selectfieldwhere("plantypes", "name", "id=" . $rowplandetail['plantypeid'] . "") ?></div>
                          </div>
                        </td>
                        <td class="w-1 fw-bold text-end"><span>₹</span><?= $rowplandetail['price'] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="text-center mt-4">
                  <?php
                  if ($membershipstatus === 'No') { ?>
                    <a class="btn btn-green py-2 w-85" data-bs-toggle="modal" data-bs-target="#modal-report" onclick='dynamicmodal("", "activateaccountalert", "1", "Account not activated")'>Choose plan</a>
                  <?php } else { ?>
                    <a class="btn btn-green py-2 w-85" data-bs-toggle="offcanvas" href="#offcanvasEnd<?= $rowplan['id'] ?>" role="button" aria-controls="offcanvasEnd<?= $rowplan['id'] ?>">Choose plan</a>
                  <?php } ?>
                  <div class="offcanvas offcanvas-end mt-0" tabindex="-1" id="offcanvasEnd<?= $rowplan['id'] ?>" aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                      <h2 class="offcanvas-title" id="offcanvasEndLabel">Order Summary</h2>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <div class="card">
                        <div class="card-body">
                          <div class="row g-2 align-items-center">

                            <div class="col" style="text-align: left;">
                              <h4 class="card-title m-0">
                                <?= $rowplan['name'] ?>
                              </h4>
                              <div class="mb-3">
                                <div class="form-label"></div>
                                <input type="text" hidden class="inp" value="<?= $rowplan['id'] ?>">
                                <select class="form-select plantype w-85 pb-1 pt-1" fdprocessedid="5a12go">
                                  <?php
                                  $types = $obj->selectextrawhereupdate("plantypes", "id,name", "status = 1");
                                  $types = mysqli_fetch_all($types);
                                  foreach ($types as list($id, $name)) { ?>
                                    <option value="<?= $id ?>"><?= $name ?></option>
                                  <?php } ?>
                                </select>
                              </div>


                            </div>
                            <div class="col-auto bill-date text-secondary mt-5 amt" style="font-size: 14px;">
                              <span>₹</span> <?= $monthlyplan['price'] ?>
                            </div>

                          </div>
                          <div class="row g-2 align-items-center">

                            <div class="col" style="text-align: left;">
                              <!-- <h4 class="card-title m-0">
                                  Subscribed Plan Name
                                </h4> -->
                              <div style="color: gray; font-weight: 500;  font-size: 12px;">
                                CGST - 9% & SGST - 9%
                              </div>
                            </div>
                            <div class="col-auto bill-date text-secondary gstamt" style="font-size: 14px;">
                              <span>₹</span><?php
                                            $gst = $monthlyplan['price'] * 18 / 100;
                                            echo $gst ?>
                            </div>

                          </div>
                          <hr class="mt-3" style="margin-bottom: 1px;">
                          <hr class="mt-0 mb-2">
                          <div class="row g-2 align-items-center">

                            <div class="col" style="text-align: left;">

                              <div style="color: rgb(0, 0, 0); font-weight: 500;">
                                Total Amount
                              </div>
                            </div>
                            <div class="col-auto bill-date text-secondary totalamt" style="font-size: 14px;">
                              <span>₹</span> <?= $monthlyplan['price'] + $gst ?>
                            </div>

                          </div>

                        </div>
                      </div>

                      <div class="mt-3 modalbtn">
                        <button data-bs-toggle="modal" data-bs-target="#modal-report" onclick='dynamicmodal("<?= $rowplan["id"] ?>", "addpayment", "1", "Payment Options")' class="btn btn-primary py-2 w-100" style="background-color: black; 
                          font-weight: 700;" type="button" data-bs-dismiss="pay" data-bs-toggle="modal" data-bs-target="#modal-scrollable">
                          I'm Ready to Pay
                        </button>
                      </div>
                      <div class="btn-list mt-4" style="text-align: center; display: block; font-size: 16px; font-weight: 700;">
                        <p>
                          <svg style="color: rgb(1, 219, 114); stroke-width: 2.5px !important; width: 25px; height: 25px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5"></path>
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                            <path d="M15 19l2 2l4 -4"></path>
                          </svg>
                          Secure Payment
                        </p>

                      </div>
                      <p style="font-size:12px;">We accept Debit Cards, Credit Card, Netbanking, Paytm, Phonepe, Google Pay & other UPI.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="offcanvas offcanvas-end mt-0" tabindex="-1" id="offcanvasEnd99" aria-labelledby="offcanvasEndLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">Order Summary</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="card">
              <div class="card-body">
                <div class="row g-2 align-items-center">

                  <div class="col" style="text-align: left;">
                    <h4 class="card-title m-0">
                      Account Activation Plan
                    </h4>
                    <h5>(gst inclusive)</h5>
                    <div class="mb-3">
                      <div class="form-label"></div>
                      <input type="text" hidden class="inp" value="5000">
                      <!-- <select class="form-select plantype w-85 pb-1 pt-1" fdprocessedid="5a12go">
                      <?php
                      $types = $obj->selectextrawhereupdate("plantypes", "id,name", "status = 1");
                      $types = mysqli_fetch_all($types);
                      foreach ($types as list($id, $name)) { ?>
                        <option value="<?= $id ?>"><?= $name ?></option>
                      <?php } ?>
                    </select> -->
                    </div>


                  </div>
                  <div class="col-auto bill-date text-secondary mt-3 amt" style="font-size: 14px;">
                    <span>₹</span> <?= $activationamt ?>
                  </div>

                </div>
                <div class="g-2 align-items-center">

                  <hr class="mt-1" style="margin-bottom: 1px;">
                  <hr class="mt-0 mb-0">
                  <div class="row g-2 align-items-center mt-0">

                    <div class="col" style="text-align: left;">

                      <div style="color: rgb(0, 0, 0); font-weight: 500;">
                        Total Amount
                      </div>
                    </div>
                    <div class="col-auto bill-date text-secondary totalamt" style="font-size: 14px;">
                      <span>₹</span> <?= $activationamt ?>
                    </div>

                  </div>

                </div>
              </div>


            </div>
            <div class="mt-3 modalbtn">
              <button data-bs-toggle="modal" data-bs-target="#modal-report" onclick='dynamicmodal("membership", "addpayment", "", "Add Payment")' class="btn btn-primary py-2 w-100" style="background-color: black; 
                          font-weight: 700;" type="button" data-bs-dismiss="pay" data-bs-toggle="modal" data-bs-target="#modal-scrollable">
                I'm Ready to Pay
              </button>
            </div>
            <div class="btn-list mt-4" style="text-align: center; display: block; font-size: 16px; font-weight: 700;">
              <p>
                <svg style="color: rgb(1, 219, 114); stroke-width: 2.5px !important; width: 25px; height: 25px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5"></path>
                  <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                  <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                  <path d="M15 19l2 2l4 -4"></path>
                </svg>
                Secure Payment
              </p>

            </div>
            <p style="font-size:12px; text-align:center;">We accept Debit Cards, Credit Card, Netbanking, Paytm, Phonepe, Google Pay & other UPI.</p>

          </div>
        </div>
        <!-- <div class="col-12">
          <div class="card card-md">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="h3">Enterprise-ready. Reach out for a custom quote.</h2>
                  <p class="m-0">Tabler is designed to work great for large enterprises. Take a look at our feature comparison.</p>
                </div>
                <div class="col-auto">
                  <a href="#" class="btn">
                    Book a demo
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>

    </div>
  </div>
</div>
<?php
$pagemaincontent = ob_get_contents();
ob_end_clean();

$pagemeta = "";
$pagetitle = "Your Dashboard-";
$contentheader = "";
$pageheader = "";
include "main/templete.php"; ?>
<script>
  $('.plantype').on('change', function() {
    ref = $(this).closest('.offcanvas-body')
    planid = $(this).closest('.offcanvas-body').find('.inp').val()
    plantypeid = $(this).val()
    console.log(plantypeid)
    $.post({
      url: "main/fetchplanamount.php",
      data: {
        plantypeid: plantypeid,
        planid: planid
      },
      success: function(response) {
        console.log(response, 'rrr')
        gstamt = parseFloat(response) * 18 / 100
        totalamt = parseFloat(response) + gstamt
        $(ref).find('.amt').html('₹' + response)
        $(ref).find('.gstamt').html('₹' + gstamt)
        $(ref).find('.totalamt').html('₹' + totalamt)
        $(ref).find('.modalbtn').html(`<button data-bs-toggle="modal" data-bs-target="#modal-report" onclick="dynamicmodal('${planid}', 'addpayment', '${plantypeid}', 'Add Payment Immidiate')" class="btn btn-primary w-100" style="background-color: black; font-weight: 700;" type="button" data-bs-dismiss="pay" data-bs-toggle="modal" data-bs-target="#modal-scrollable">
                        I'm Ready to Pay
                      </button>`);
      },
    });
  });
</script>
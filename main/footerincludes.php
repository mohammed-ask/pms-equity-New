<!-- Shoubham Templte -->

<script src="main/dist/userstuff/assets/vendor/libs/jquery/jquery.js"></script>
<script src="main/dist/userstuff/assets/vendor/libs/popper/popper.js"></script>
<script src="main/dist/userstuff/assets/vendor/js/bootstrap.js"></script>
<script src="main/dist/userstuff/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="main/dist/userstuff/assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="main/dist/userstuff/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="main/dist/userstuff/assets/js/main.js"></script>

<!-- Page JS -->
<script src="main/dist/userstuff/assets/js/dashboards-analytics.js"></script>
<script src="main/dist/userstuff/assets/vendor/js/app-email.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- file upload -->

<script src="main/dist/userstuff/assets/vendor/js/file-upload.js"> </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>


<!-- <script src="main/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="main/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- <script src="main/dist/userjs/selectr.min.js"></script> -->
<script src="main/dist/plugins/apex-chart/apexcharts.min.js"></script>
<script src="main/dist/pages/market.init.js"></script>
<!-- App js -->
<!-- <script src="main/dist/userjs/app.js"></script> -->
<script>
  new Selectr('#Watchlist', {
    searchable: false,
  });

  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  });
</script>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="main/dist/js/init-alpine.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script> -->
<!-- <script src="main/dist/js/charts-lines.js" defer></script> -->
<!-- <script src="main/dist/js/charts-pie.js" defer></script> -->
<style>
  .stickyframe {
    position: sticky;
    top: 0;
  }
</style>
<!-- jQuery -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="main/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="main/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="main/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="main/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="main/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="main/plugins/select2/js/select2.full.min.js"></script>

<!-- JQVMap -->
<script src="main/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="main/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- daterangepicker -->
<script src="main/plugins/moment/moment.min.js"></script>
<script src="main/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="main/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="main/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="main/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="main/dist/js/jquery-ui-timepicker-addon.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- AdminLTE App -->
<script src="main/dist/js/adminlte.js"></script>
<script src="main/dist/js/customfunction.js?ver=<?php echo time(); ?>"></script>
<script src="main/dist/js/del.js?ver=<?php echo time(); ?>"></script>
<script src="main/dist/js/functions.js?ver=<?php echo date('His'); ?>"></script>
<script src="main/dist/js/view1.js?ver=<?php echo date('His'); ?>"></script>
<script src="main/dist/js/search.js"></script>
<script src="main/dist/js/jquery.bvalidator-yc.js"></script>
<!--<script src="main/dist/js/bs3form.min.js"></script>-->
<script src="main/dist/js/b3form.js"></script>

<div class="modal fade" id="customConfirmModal" tabindex="-1" role="dialog" aria-labelledby="customConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-broswer" role="document">
    <div class="modal-content browser-model-content">
      <div class="modal-body">
        Are you sure you want to proceed?
      </div>
      <div class="modal-footer modal-footer-browser">
        <button type="button" class="btn btn-secondary browser-btn browser-btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary browser-btn browser-btn-primary" onclick="handleCustomConfirm(true)">Proceed</button>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($extrajs)) {
  echo $extrajs;
} ?>
<script>
  <?php
  if (isset($onpagejs)) {
    echo $onpagejs;
  } ?>
</script>
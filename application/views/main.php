<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$site['name_app']." &mdash; ".$c_judul; ?></title>
  <!-- plugins:css -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/vendors/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/vendors/ti-icons/css/themify-icons.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/vendors/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/css/custom.css">
  <script src="<?php echo base_url()?>assets/themes/js/jquery-3.2.1.min.js"></script>
  <!-- endinject -->
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/vendors/summernote/summernote-bs4.css">
  <!--End summernote -->
  <link rel="shortcut icon" href="<?php echo $icon; ?>"/>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->view('base/navbar');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->view('base/sidebar'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <?=$contents; ?>
            <!-- End Contents -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php $this->view('base/footer'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url()?>assets/themes/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url()?>assets/themes/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>assets/themes/js/off-canvas.js"></script>
 
  <script src="<?php echo base_url()?>assets/themes/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url()?>assets/themes/js/template.js"></script>
  <script src="<?php echo base_url()?>assets/themes/js/todolist.js"></script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url()?>assets/themes/js/dashboard.js"></script>
  <script src="<?php echo base_url()?>assets/themes/js/file-upload.js"></script>
  <!-- End custom js for this page-->
  <!-- SweetAlert2 -->
  <script src="<?php echo base_url()?>assets/themes/vendors/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/js/alert.js"></script>
  <!-- End SweetAlert2 -->
  <!-- Summernote -->
  <script src="<?php echo base_url()?>assets/themes/vendors/summernote/summernote-bs4.min.js"></script>
  <!-- Input mask -->
  <!-- <script src="<?php echo base_url()?>assets/themes/vendors/input-mask/js/jquery.mask.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/js/custom.js"></script> -->
  <!-- js datatables-->
  <script src="<?php echo base_url()?>assets/themes/vendors/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url()?>assets/themes/vendors/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
    $(function () {
        $(".datatable").DataTable();
        $('.datatables').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        });
        $('.textarea').summernote({
        toolbar:[
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['para', ['ul','ol','paragraph']],
        ]
      })
    });
    </script>
  <!-- End js datatables-->
</body>

</html>
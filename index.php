<?php  
  require_once('config/connection.php');
  require_once('config/helper.php');
  $size = explode('x',app('size_label'));
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?= BASE_URL; ?>img/barcode.png">
  <title><?= app('name_apps'); ?> - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?= BASE_URL; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= BASE_URL; ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= BASE_URL; ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL; ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-qrcode"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ASSETS APPS.</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="guide.php">
          <i class="fas fa-fw fa-book"></i>
          <span>User Guide</span></a>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <h6 class="mt-2">MANAGEMENTS ASSETS AT <b>RSUD JARAGE SASAMEH</b></h6>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li><small class="text-muted">VERSION 0.1.0</small></li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
            
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Medicines Data</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                      <thead>
                          <tr>
                          <th>Kode Obat</th>
                          <th>Nama Obat</th>
                          <th>QRCode</th>
                          <th>Link</th>
                          <th>Selection</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $query = mysqli_query($link, "SELECT * FROM products");
                        $dataMedicines = [];
                        while($row = mysqli_fetch_assoc($query)){
                          $dataMedicines[] = $row['kode_obat'];
                      ?>
                          <tr>
                            <td><?= $row['kode_obat'] ?></td>
                            <td><?= $row['nama_obat'] ?></td>
                            <td class="text-center"><a href="<?= BASE_URL.'img/qrcode/'.$row['e_code']; ?>" class="text-muted" target="_blank"><i class="fas fa-qrcode"></i></a></td>
                            <td class="text-center"><a href="<?= $row['d_code']; ?>" class="text-muted" target="_blank"><i class="fas fa-link"></i></a></td>
                            <td class="text-center"><input type="checkbox" class="data_check" data_id="<?= $row['kode_obat']; ?>" checked></td>
                          </tr>
                      <?php 
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            
            <div class="col-lg-6 mb-4">

              <!-- Some Information -->
              <div class="row">
                <div class="col-6">
                    
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Medicines</div>
                          <div class="h4 mb-0 font-weight-bold text-gray-800 totalMedicines">-</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-pills fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-6">
                    
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Datetime</div>
                          <div class="h4 mb-0 font-weight-bold text-gray-800 time">00:00:00</div>
                          <small class="mb-0 mt-1 font-weight-light text-muted d-block"><?= waktu('day').', '.date('d').' '.waktu('month').' '.date('Y'); ?></small>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Form Export -->
              <div class="row mt-4">
                <div class="col-12">

                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Export to PDF</h6>
                    </div>
                    <div class="card-body">
                      <div class="form-row mb-3">
                        <div class="col-lg-2">
                          <label>Data Selected</label><br>
                          <button type="button" class="btn btn-sm mt-1 btn-success btn-block btn-count"><span id="countDataExport">0</span> Selected</button>
                        </div>
                        <div class="col-lg-3 pl-2">
                          <label> </label>
                          <div class="form-check mt-3">
                          <input class="form-check-input checkAllData" type="checkbox" id="checkAll" checked>
                          <label class="form-check-label" for="checkAll">
                            Check All Data
                          </label>
                        </div>
                        </div>
                        <div class="col-lg-7">
                          <label>Size of Label (Width x Height) with Centimeters</label>
                          <div class="form-row">
                            <div class="col">
                              <input type="number" class="form-control" placeholder="Width" value="<?= $size[0]; ?>" id="inputWidth" readonly>
                            </div>
                            <div class="col">
                              <input type="number" class="form-control" placeholder="Height" value="<?= $size[1]; ?>" id="inputHeight" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputNote">Note (Optional)</label>
                        <textarea class="form-control" id="inputNote" rows="3"></textarea>
                      </div>
                      <button type="button" class="btn btn-block btn-primary" id="generatePDF"><i class="fas fa-download fa-sm text-white-50"></i> Generate File</button>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= BASE_URL; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASE_URL; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= BASE_URL; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= BASE_URL; ?>js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="<?= BASE_URL; ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= BASE_URL; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= BASE_URL; ?>js/demo/datatables-demo.js"></script>

  <script>
  $(document).ready(function(){
    var bind      = [<?= implode($dataMedicines, ','); ?>];
    var countData = bind.length;
    $('#countDataExport').text(countData);
    $('.totalMedicines').text(countData);

    // Checking Data
    $('.data_check').click(function(){
      var isCheck = $(this).is(":checked");
      var data_id = $(this).attr('data_id');

      if (isCheck) {
        if (bind.indexOf(parseInt(data_id)) == -1) {
          bind.push(parseInt(data_id)); countData++;
        }
      } else {
        bind.remove(parseInt(data_id)); countData--;
        $("#checkAll").prop("checked", false);
      }
      
      $('#countDataExport').text(countData);
      // Validation
      if (countData == 0) {
        $('.btn-count').removeClass('btn-success').addClass('btn-danger');
        $('#generatePDF').addClass('disabled').attr('disabled','disabled').css('cursor', 'no-drop');
      } else {
        $('.btn-count').removeClass('btn-danger').addClass('btn-success');
        $('#generatePDF').removeClass('disabled').removeAttr('disabled').css('cursor', 'pointer');
      }
    });

    $('.checkAllData').click(function(){
      if ( $(this).is(":checked")){
        $('.data_check').not(this).prop('checked', this.checked);
        bind = [<?= implode($dataMedicines, ','); ?>];
        countData = bind.length;
        $('#countDataExport').text(countData);
        $('.btn-count').removeClass('btn-danger').addClass('btn-success');
        $('#generatePDF').removeClass('disabled').removeAttr('disabled').css('cursor', 'pointer');
      } else {
        $('.data_check').not(this).removeAttr('checked');
        bind = [];
        countData = bind.length;
        $('#countDataExport').text(countData);
        $('.btn-count').removeClass('btn-success').addClass('btn-danger');
        $('#generatePDF').addClass('disabled').attr('disabled','disabled').css('cursor', 'no-drop');
      }
    });

    // Remove array by value function
    Array.prototype.remove = function() {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };

    // Generate PDF (Export)
    $('#generatePDF').click(function(){
      console.log(bind);
      window.open("<?= BASE_URL; ?>generatePDF/template.php?w=" + $('#inputWidth').val() + "&h=" + $('#inputHeight').val() + "&export=" + bind.join('@') + '&note=' + $('#inputNote').val(), '_blank'); 
    });

    // Time
    setInterval(function(){ 
      var clock = new Date();
      var hours = clock.getHours(); 
      var minutes = clock.getMinutes(); 
      var seconds = clock.getSeconds(); 

      if (clock.getHours() < 10) {
        hours = "0" + clock.getHours();
      }
      if (clock.getMinutes() < 10) {
        minutes = "0" + clock.getMinutes();
      }
      if (clock.getSeconds() < 10) {
        seconds = "0" + clock.getSeconds();
      }

      $('.time').text(hours + ':' + minutes + ':' + seconds);
    }, 1000);

  });
  </script>
</body>
</html>
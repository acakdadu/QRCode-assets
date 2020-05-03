<?php  
  require_once('../config/connection.php');
  require_once('../config/helper.php');

  $width  = $_GET['w'];
  $height = $_GET['h'];
  $dataExport = explode('@', $_GET['export']);
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
  <title><?= app('name_apps'); ?> - Data Export</title>
  <link href="<?= BASE_URL; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .fix {
      /* border: 1px dotted red; */
    }
    .label {
      border: 2px solid #f39c12;
      padding: 15px;
      width: <?= $width; ?>cm;
      height: <?= $height ; ?>cm;
      margin: auto;
    }
    .card {
      min-height: 5px;
    }
  </style>
</head>
<body onload="window.print()">
  <br>
  <div class="container">
    
    <?php 
      if($_GET['note'] != ''){
    ?>
    <div class="row">
      <div class="col-12">
        <small class="font-weight-bold">Catatan: </small>
        <p class="font-italic"><?= $_GET['note']; ?></p>
      </div>
    </div>
    <hr class="mt-0">
    <?php 
      }
    ?>

    <div class="row"> 
      <?php 
        for ($i=0; $i < count($dataExport); $i++) {
          $runSql = mysqli_query($link, "SELECT * FROM products WHERE kode_obat = ".$dataExport[$i]);
          $product = mysqli_fetch_assoc($runSql);
      ?>

      <div class="col-4 fix p-0 mb-3">
        <div class="label">
          <div class="row">
            <div class="col text-left">
              <img src="<?= BASE_URL.'img/kf.png' ?>" alt="Kimia Farma Logo" width="70">
            </div>
            <div class="col text-right">
              <img src="<?= BASE_URL.'img/qrcode/'.$product['e_code']; ?>" alt="QRCode Logo" width="40">
            </div>
          </div>
          <div class="row mt-1">
            <div class="col">
              <small class="font-weight-bold d-block text-center mb-2"><?= $product['nama_obat']; ?></small>
            </div>
          </div>  
          <div class="row">
            <div class="col">
              <div class="card" style="background-color: #e67e22;"></div>
              <div class="card mt-1" style="background-color: #2980b9;"></div>
            </div>
          </div>
        </div>
      </div>
      
      <?php
        }
      ?>
    </div> 



  </div>

  
  <!-- Bootstrap core JavaScript-->
  <script src="<?= BASE_URL; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASE_URL; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
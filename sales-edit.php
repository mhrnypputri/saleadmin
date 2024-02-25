<?php
session_start();

  if(!ISSET($_SESSION['id']))
  {
    header('location:index.php');
  }

  $id=$_REQUEST['id'];
  $koneksi = mysqli_connect('127.0.0.1','root', '', 'magang');
  $kueri = "SELECT * FROM jual WHERE id='".$id."'"; 
  $hasil = mysqli_query($koneksi, $kueri);
  $row = mysqli_fetch_assoc($hasil);
            
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sales</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">PT Remco Rubber Indonesia</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php
              $conn = mysqli_connect('127.0.0.1', 'root', '', 'magang');
              $query = mysqli_query($conn, "SELECT * FROM acc WHERE id='$_SESSION[id]'");
              $fetch = mysqli_fetch_array($query);
      
              echo $fetch['username'];

          ?>
            </span>
          </a>
          <!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <a class="dropdown-item d-flex align-items-center" href="log-out.php">
                <i class="bi bi-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a href="sales.php" class="nav-link collapsed" data-bs-target="#sales-nav">
          <i class="bi bi-collection"></i><span>Sales</span></i>
        </a>
      </li><!-- End Sales Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#analytic-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-graph-up"></i><span>Analytic</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="analytic-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="chart-buyer.php">
              <i class="bi bi-circle"></i><span>Buyer</span>
            </a>
          </li>
          <li>
            <a href="chart-pack.php">
              <i class="bi bi-circle"></i><span>Packing Type</span>
            </a>
          </li>
        </ul>
      </li><!-- End Analytic Nav -->

      <!-- <li class="nav-item">
        <a href="user-profile.php" class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse">
          <i class="bi bi-gear"></i><span>Setting</span></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        </ul>
      </li> -->
      <!-- End Setting Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sales</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="sales.php">Sales</a></li>
          <li class="breadcrumb-item active"><a href="sales-edit.php">Edit Data</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Edit Data</h4>

            <!-- Table with stripped rows -->
            <form method="POST" action="sales-edit.php">

            <input type="hidden" name="new" value="1" />
            <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
              
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Shipping Date</label>
                <div class="col-sm-10">
                  <input type="date" name="tgl" class="form-control" id="tgl" value="<?php echo $row['tgl'];?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Qtt (MT)</label>
                <div class="col-sm-10">
                  <input type="int" name="qtt" id="qtt" class="form-control" value="<?php echo $row['qtt'];?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Buyer</label>
                <div class="col-sm-10">
                <input type="text" name="buyer" id="buyer" class="form-control" value="<?php echo $row['buyer'];?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Packing Type</label>
                <div class="col-sm-10">
                  <input type="text" name="pack" id="pack" class="form-control" value="<?php echo $row['pack'];?>">
                </div>
              </div>

              <div class="text-center">
                <input type="submit" name="bupdate" class="btn btn-primary" value="Update">
                <a href="sales.php" class="btn btn-danger">Back</a>
              </div>

            </form>

            <br>

            <?php
              $koneksi = mysqli_connect('127.0.0.1','root', '', 'magang');
              if(isset($_POST['bupdate']))
              {
                $id = $_POST['id'];
                $tgl = $_POST['tgl'];
                $qtt = $_POST['qtt'];
                $buyer = $_POST['buyer'];
                $pack = $_POST['pack'];

                $update = "UPDATE jual SET tgl='".$tgl."', qtt='".$qtt."', buyer='".$buyer."', pack='".$pack."' WHERE id='".$id."'";
                mysqli_query($koneksi, $update);

                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <div align='center'><i class='bi bi-check-circle me-1'></i> Data is successfully edited </div>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";  
              }
              mysqli_close($koneksi);
            ?>
            
              <!-- End Table with stripped rows -->
            <script>
              if ( window.history.replaceState ) 
              {
                window.history.replaceState( null, null, window.location.href );
              }
            </script>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PT Remco</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
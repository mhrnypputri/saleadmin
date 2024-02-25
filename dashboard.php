<?php
session_start();

if(!ISSET($_SESSION['id']))
{
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rubber Sales</title>
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
        <span class="d-none d-lg-block">PT. Remco Rubber Indonesia</span>
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
        <a class="nav-link collapsed" href="dashboard.php">
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
        <a href="user-profile.php" class="nav-link collapsed" data-bs-target="#setting-nav">
          <i class="bi bi-gear"></i><span>Setting</span></i>
        </a>
      </li> -->
      <!-- End Setting Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- columns -->
        <div class="col-xs-6">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Sales</h6>
                      <span>
                      <?php
                        $koneksi = mysqli_connect('127.0.0.1', 'root', '', 'magang');
                        $query = mysqli_query($koneksi, "SELECT SUM(qtt) as total FROM jual");
                        $fetch = mysqli_fetch_array($query);
                        echo  $fetch['total'];
                      ?>
                      </span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->

            <!-- Packing Type Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="ps-3">
                    <h6>Packing Type</h6>
                    <span>
                      <?php
                        $conn = mysqli_connect('127.0.0.1', 'root', '', 'magang');
                        $kueri = mysqli_query($conn, "SELECT COUNT(DISTINCT pack) as total FROM jual");
                        $fetch = mysqli_fetch_array ($kueri);

                        echo $fetch['total'];
                      ?>
                    </span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Packing Type Card -->


            <!-- Costumer Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                    <h6>Costumers</h6>
                    <span>
                      <?php
                        $conn = mysqli_connect('127.0.0.1', 'root', '', 'magang');
                        $kueri = mysqli_query($conn, "SELECT COUNT(DISTINCT buyer) as total FROM jual");
                        $fetch = mysqli_fetch_array ($kueri);

                        echo $fetch['total'];
                      ?>
                    </span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Costumer Card -->
          </div>
        </div>
        <!-- end columns -->

        <section class="section">
          <div class="row">
              
            <!-- Buyer Reports -->
              <div class="col-lg-6">
                <div class="card">

                  <div class="card-body">
                    <h1 class="card-title">Buyer Report</h1>
                  
                  <?php
                    $conn = mysqli_connect('127.0.0.1', 'root', '', 'magang');
                    $sqlQuery = "SELECT qtt, buyer FROM jual";
                    $result = mysqli_query($conn, $sqlQuery);

                    // Inisialisasi array untuk menyimpan data yang sudah digabung
                    $data = array();

                    while ($selectData = mysqli_fetch_assoc($result)) 
                    {
                        $buyer = $selectData['buyer'];
                        $qtt = $selectData['qtt'];
                        
                        // Jika pembeli sudah ada dalam array $data, tambahkan jumlah qtt
                        if (array_key_exists($buyer, $data)) 
                        {
                            $data[$buyer] += $qtt;
                        } 
                        else 
                        {
                            // Jika pembeli belum ada dalam array $data, tambahkan sebagai pembeli baru
                            $data[$buyer] = $qtt;
                        }
                    }

                    // Buat array baru untuk menyimpan label pembeli dan jumlah qtt
                    $dataX = array_keys($data);
                    $dataY = array_values($data);

                    mysqli_close($conn);
                  ?> 

                  <canvas id="barChartbuyer" style="max-height: 400px;"></canvas>
                    <script>
                      const xVal = <?php echo json_encode($dataX); ?>;
                      const yVal = <?php echo json_encode($dataY); ?>;

                      document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#barChartbuyer'), {
                          type: 'bar',
                          data: {
                            labels: xVal,
                            datasets: [{
                              label: 'Buyer',
                              backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                              ],
                              borderColor: [
                                'rgb(54, 162, 235)',
                              ],
                              borderWidth: 1,
                              data : yVal
                            }]
                          },
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true
                              }
                            }
                          }
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>
              <!-- End Buyer Reports -->

              <!-- Packing Type Reports -->
              <div class="col-lg-6">
                <div class="card">

                  <div class="card-body">
                    <h1 class="card-title">Packing Type Report</h1>
                  
                    <?php
                      $conn = mysqli_connect('127.0.0.1', 'root', '', 'magang');
                      $sqlQuery = "SELECT qtt, pack FROM jual";
                      $result = mysqli_query($conn, $sqlQuery);

                      // Inisialisasi array untuk menyimpan data yang sudah digabung
                      $data = array();

                      while ($selectData = mysqli_fetch_assoc($result)) 
                      {
                          $pack = $selectData['pack'];
                          $qtt = $selectData['qtt'];
                          
                          // Jika pembeli sudah ada dalam array $data, tambahkan jumlah qtt
                          if (array_key_exists($pack, $data)) 
                          {
                              $data[$pack] += $qtt;
                          } 
                          else 
                          {
                              // Jika pembeli belum ada dalam array $data, tambahkan sebagai pembeli baru
                              $data[$pack] = $qtt;
                          }
                      }

                      // Buat array baru untuk menyimpan label pembeli dan jumlah qtt
                      $dataX = array_keys($data);
                      $dataY = array_values($data);

                      mysqli_close($conn);
                    ?> 

                  <canvas id="barChartpack" style="max-height: 400px;"></canvas>
                    <script>
                      const xxVal = <?php echo json_encode($dataX); ?>;
                      const yyVal = <?php echo json_encode($dataY); ?>;

                      document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#barChartpack'), {
                          type: 'bar',
                          data: {
                            labels: xxVal,
                            datasets: [{
                              label: 'Packing Type',
                              backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                              ],
                              borderColor: [
                                'rgb(255, 99, 132)',
                              ],
                              borderWidth: 1,
                              data : yyVal
                            }]
                          },
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true
                              }
                            }
                          }
                        });
                      });
                    </script>

                  </div>
                  
                </div>
              </div>
              <!-- End Packing Type Reports -->
            </div>
          </div>
        </section>

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Recent Sales <span></h5>
                  <form method="post" action="sales.php">
                  <?php
                    $koneksi = mysqli_connect('127.0.0.1','root', '', 'magang');
                    if(isset($_POST['bsave']))
                    {
                      $id=$_POST['id'];
                      $tgl=$_POST['tgl'];
                      $qtt=$_POST['qtt'];
                      $buyer=$_POST['buyer'];
                      $pack=$_POST['pack'];

                      $kueri = "INSERT INTO jual VALUES('$id','$tgl','$qtt','$buyer','$pack')";
                      mysqli_query($koneksi, $kueri);
                    }
                  ?>
                  <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Shipping Date</th>
                      <th>Qtt (MT)</th>
                      <th>Buyer</th>
                      <th>Packing Type</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php                 
                    if (isset($_GET['pagenum']) && $_GET['pagenum'] != "") 
                    {
                      $pagenum = $_GET["pagenum"];
                    } 
                    else
                    {
                      $pagenum = 1;
                    }
                    $recordperpage = 10;
                    $offset = ($pagenum - 1) * $recordperpage;
                      
                    $result = mysqli_query($koneksi, "SELECT * FROM jual LIMIT $offset, $recordperpage");
                    $nom = $offset + 1; // Inisialisasi nomor dari halaman yang sedang ditampilkan                                  
                  
                    while ($data = mysqli_fetch_assoc($result))
                    {
                      ?>
                        <tr>
                          <td>&nbsp;<?php echo $nom++; ?></td>
                          <td>&nbsp;<?php echo $data['tgl']; ?></td>
                          <td>&nbsp;<?php echo $data['qtt']; ?></td>
                          <td>&nbsp;<?php echo $data['buyer']; ?></td>
                          <td>&nbsp;<?php echo $data['pack']; ?></td>	
                        </tr>
                        <tr>
                        </tr>
                      <?php
                    }
                  ?>
                  </tbody>
                </table>

                </div>
                <?php
                if (!isset($_GET['search']))
                {
                  $koneksi = mysqli_connect('127.0.0.1','root', '', 'magang');
                  $totalquery = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM jual");
                  $totaldata = mysqli_fetch_assoc($totalquery);
                  $totalpages = ceil($totaldata['total'] / $recordperpage);

                  echo "
                  <nav aria-label='Page navigation example'>
                  <ul class='pagination justify-content-end'>
                    <li class='page-item'>
                      <a class='page-link' haria-label='Previous'>
                        <span aria-hidden='true'>&laquo;</span>
                      </a>
                    </li>";
                  $pagination = '';
                  if ($totalpages > 1)
                  {
                    for ($i = 1; $i <= $totalpages; $i++)
                    {
                      if ($i == $pagenum)
                      {
                        $pagination .= "<li class='page-item active'><a class='page-link' href='?pagenum=" . $i . "'>" . $i . "</a></li>";
                      } 
                      else 
                      {
                        $pagination .= "<li class='page-item'><a class='page-link' href='?pagenum=" . $i . "'>" . $i . "</a></li>";
                      }
                    }
                    echo $pagination;
                  }
                  echo "
                    <li class='page-item'>
                      <a class='page-link' aria-label='Next'>
                        <span aria-hidden='true'>&raquo;</span>
                      </a>
                    </li>
                  </ul>
                  </nav>"; 
                }
              ?>

              </div>
            </div><!-- End Recent Sales -->
          
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PT. REMCO</span></strong>. All Rights Reserved
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
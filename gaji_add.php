<?php
include_once "koneksi.php";
ob_start();
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

if ($_SESSION['level'] == "pegawai") {
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Sistem Informasi Pegawai - CV. Dharma Cipta Pratama</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">

          <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="../assets/img/icons/logo.jpg" alt="Logo.jpg" width="25px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">SI Pegawai</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item">
            <a href="index.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
          </li>

          <li class="menu-item">
            <a href="jabatan_show.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-collection"></i>
              <div>Jabatan</div>
            </a>
          </li>
          <li class="menu-item active">
            <a href="gaji_show.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-wallet"></i>
              <div>Gaji</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pegawai_show.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div>Pegawai</div>
            </a>
          </li>
          <li class="menu-item ">
            <a href="pengawasan_show.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-buildings"></i>
              <div>Pengawasan</div>
            </a>
          </li>
          <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-library"></i>
              <div>Laporan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="laporan_bangunan.php" class="menu-link">
                  <div>Project Bangunan</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="laporan_jalan.php" class="menu-link">
                  <div>Project Jalan</div>
                </a>
              </li>
              <li class="menu-item ">
                <a href="laporan_jembatan.php" class="menu-link">
                  <div>Project Jembatan</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <ul class="navbar-nav flex-row align-items-center ms-auto">

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?= $_SESSION['username'] ?></span>
                          <small class="text-muted"><?= $_SESSION['level'] ?></small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>

                  <li>
                    <a class="dropdown-item" href="logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gaji /</span> Tambah Data<a href="gaji_show.php" class="mx-2 btn rounded-pill btn-warning">
                <span class="tf-icons bx bx-arrow-back"></span>&nbsp; Kembali
              </a></h4>

            <?php
            if (isset($_POST['Submit'])) {
              $gaji = $_POST['gaji'];
              $gaji_bersih = $_POST['gaji_bersih'];
              $potongan = $_POST['potongan'];

              $insert_data = mysqli_query($con, "INSERT INTO gaji(gaji, gaji_bersih, potongan) VALUES ('$gaji', '$gaji_bersih', '$potongan')");

              if ($insert_data) {
                echo '
                        <div class="alert alert-success alert-dismissible" role="alert">
                            Berhasil Menambah Data
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
              } else {
                echo '
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            Gagal Menambah Data
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
              }
            }
            ?>

            <!-- Basic Layout -->
            <div class="row">
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Gaji</h5>
                  </div>
                  <div class="card-body">
                    <form action="gaji_add.php" method="post">
                      <div class="mb-3">
                        <label class="form-label" for="gaji">Jumlah Gaji</label>
                        <input type="text" class="form-control" id="gaji" name="gaji" placeholder="Jumlah Gaji (Rupiah)" required />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="gaji_bersih">Jumlah Gaji Bersih</label>
                        <input type="text" class="form-control" id="gaji_bersih" name="gaji_bersih" placeholder="Jumlah Gaji Bersih (Rupiah)" required />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="potongan">Jumlah Potongan</label>
                        <input type="text" class="form-control" id="potongan" name="potongan" placeholder="Jumlah Potongan (Rupiah)" required />
                      </div>
                      <button type="submit" name="Submit" class="btn btn-primary">Tambah</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                <a href="#" class="footer-link fw-bolder">CV. Dharma Cipta Pratama</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
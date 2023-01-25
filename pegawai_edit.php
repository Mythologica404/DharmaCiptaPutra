<?php
ob_start();
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
  include_once "koneksi.php";

    if (!isset($_GET['id'])) {
        header("Location:pegawai_show.php");
    } else {
        $id = $_GET['id'];
        $find_data = mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai = $id") or die(mysqli_error($con));

        $data = mysqli_fetch_assoc($find_data);
        $data_edit1 = $data['id_pegawai'];
        $data_edit2 = $data['nama'];
        $data_edit3 = $data['jenis_kelamin'];
        $data_edit4 = $data['agama'];
        $data_edit5 = $data['alamat'];
        $data_edit6 = $data['no_telp'];
        $data_edit7 = $data['email'];
        $data_edit8 = $data['id_jabatan'];
        $data_edit9 = $data['id_gaji'];
        $data_edit10 = $data['id_user'];
    }
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Sistem Informasi Pegawai - CV. Dharma Cipta Putra</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

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
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
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
            <li class="menu-item">
              <a href="gaji_show.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div>Gaji</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="pegawai_show.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div>Pegawai</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="pengawasan_show.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div>Pengawasan</div>
              </a>
            </li>
          </ul>
        </aside>

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pegawai /</span> Edit Data  
                    <a href="pegawai_show.php" class="mx-2 btn rounded-pill btn-warning">
                        <span class="tf-icons bx bx-arrow-back"></span>&nbsp; Kembali
                    </a></h4>
                      
              <?php
                if(isset($_POST['Submit'])) {
                    $nama = $_POST['nama'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $agama = $_POST['agama'];
                    $alamat = $_POST['alamat'];
                    $no_telp = $_POST['no_telp'];
                    $email = $_POST['email'];
                    $id_jabatan = $_POST['id_jabatan'];
                    $id_gaji = $_POST['id_gaji'];
                    $id_user = $_POST['id_user'];
                    $id = $_POST['id'];

                    $update_data = mysqli_query($con, "UPDATE pegawai SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', agama = '$agama', alamat = '$alamat', no_telp = '$no_telp', email = '$email', id_jabatan = '$id_jabatan', id_gaji = '$id_gaji', id_user = '$id_user' WHERE pegawai.id_pegawai = $id;") or die(mysqli_error($con));
                
                    if ($update_data) {
                        echo '
                        <div class="alert alert-success alert-dismissible" role="alert">
                            Berhasil Update Data
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';

                        $data_edit2 = $nama;
                        $data_edit3 = $jenis_kelamin;
                        $data_edit4 = $agama;
                        $data_edit5 = $alamat;
                        $data_edit6 = $no_telp;
                        $data_edit7 = $email;
                        $data_edit8 = $id_jabatan;
                        $data_edit9 = $id_gaji;
                        $data_edit10 = $id_user;
                    } else {
                        echo '
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            Gagal Update Data
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
                      <h5 class="mb-0">Edit Pegawai</h5>
                    </div>
                    <div class="card-body">
                      <form action="pegawai_edit.php?id=<?= $id ?>" method="post">
                        <div class="mb-3">
                          <label class="form-label" for="nama">Nama Pegawai</label>
                          <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                          <input value="<?= $data_edit2 ?>" type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai" required />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="jenis_kelamin">Nama Pegawai</label>
                          <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                            <option value="Pria" <?= $data_edit3 == "Pria" ? "selected" : "" ?>>Pria</option>
                            <option value="Wanita" <?= $data_edit3 == "Wanita" ? "selected" : "" ?>>Wanita</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="agama">Agama</label>
                          <select id="agama" name="agama" class="form-select" required>
                            <option value="Islam" <?= $data_edit4 == "Islam" ? "selected" : "" ?>>Islam</option>
                            <option value="Protestan" <?= $data_edit4 == "Protestan" ? "selected" : "" ?>>Protestan</option>
                            <option value="Katolik" <?= $data_edit4 == "Katolik" ? "selected" : "" ?>>Katolik</option>
                            <option value="Hindu" <?= $data_edit4 == "Hindu" ? "selected" : "" ?>>Hindu</option>
                            <option value="Buddha" <?= $data_edit4 == "Buddha" ? "selected" : "" ?>>Buddha</option>
                            <option value="Khonghucu <?= $data_edit4 == "Khonghucu" ? "selected" : "" ?>">Khonghucu</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="alamat">Alamat</label>
                          <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat Pegawai" required><?= $data_edit5 ?></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="no_telp">Phone No</label>
                          <input value="<?= $data_edit6 ?>" type="text" id="no_telp" name="no_telp" class="form-control phone-mask" placeholder="No. Telp Pegawai" required >
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="email">Email</label>
                          <input value="<?= $data_edit7 ?>" type="email" class="form-control" id="email" name="email" placeholder="Email Pegawai" required />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="id_jabatan">Jabatan</label>
                          <select id="id_jabatan" name="id_jabatan" class="form-select" required>
                            <?php
                              $jabatan_query = mysqli_query($con, "SELECT * FROM jabatan ORDER BY id_jabatan ASC") or die(mysqli_error($con));

                              if (mysqli_num_rows($jabatan_query) > 0) {
                                while ($data = mysqli_fetch_assoc($jabatan_query)) {
                                  echo '<option value="'.$data['id_jabatan'].'" ';
                                  if ($data_edit8 == $data['id_jabatan']) {
                                    echo 'selected';
                                  }
                                  echo '>'.$data['nama_jabatan'].'</option>';
                                }
                              }
                            ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="id_gaji">Gaji</label>
                          <select id="id_gaji" name="id_gaji" class="form-select" required>
                            <?php
                              $gaji_query = mysqli_query($con, "SELECT * FROM gaji ORDER BY id_gaji ASC") or die(mysqli_error($con));

                              if (mysqli_num_rows($gaji_query) > 0) {
                                while ($data = mysqli_fetch_assoc($gaji_query)) {
                                  echo '<option value="'.$data['id_gaji'].'" ';
                                  if ($data_edit9 == $data['id_gaji']) {
                                    echo 'selected';
                                  }
                                  echo '>Rp '.number_format($data['gaji'],2,',','.').'</option>';
                                }
                              }
                            ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="id_user">Username</label>
                          <select id="id_user" name="id_user" class="form-select" required>
                            <?php
                              $pengguna_query = mysqli_query($con, "SELECT * FROM pengguna ORDER BY id_user ASC") or die(mysqli_error($con));

                              if (mysqli_num_rows($pengguna_query) > 0) {
                                while ($data = mysqli_fetch_assoc($pengguna_query)) {
                                  echo '<option value="'.$data['id_user'].'" ';
                                  if ($data_edit10 == $data['id_user']) {
                                    echo 'selected';
                                  }
                                  echo '>'.$data['username'].'</option>';
                                }
                              }
                            ?>
                          </select>
                        </div>
                        <button type="submit" name="Submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
            </div
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  <a href="#" class="footer-link fw-bolder">CV. Dharma Cipta Putra</a>
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

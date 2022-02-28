<?php
include("session.php");

$managed_by_staffs_query = "SELECT id FROM staff WHERE type = 'MANAGEMENT' ORDER BY id";
$managed_by_staffs = mysqli_query($db, $managed_by_staffs_query);


if (isset($_GET['id'])) {
  $equipment_id = $_GET['id'];
  $get_equipment_query = "SELECT * FROM equipment WHERE id = '$equipment_id'";
  $get_equipment_result = mysqli_query($db, $get_equipment_query);
  if (mysqli_num_rows($get_equipment_result) == 1) {
    $equipment = mysqli_fetch_array($get_equipment_result);
    $isUpdate = true;
  } else {
    header("location: inventories.php");
  }
} else {
  $prev_id_query = "SELECT id FROM equipment ORDER BY id DESC LIMIT 1";
  $prev_id = mysqli_fetch_array(mysqli_query($db, $prev_id_query));
  $equipment_id = "EQ" . sprintf("%06d", substr($prev_id['id'], 2) + 1);
  $isUpdate = false;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $logged_by = mysqli_real_escape_string($db, $_POST['logged_by']);

  if ($isUpdate) {
    $equipment_query = "UPDATE equipment SET
      name = '$name',
      status = '$status',
      logged_by = '$logged_by' 
      WHERE id = '$equipment_id'";
  } else {
    $equipment_query = "INSERT INTO equipment VALUES(
      '$equipment_id', 
      '$name', 
      '$status', 
      '$logged_by')";
  }

  try {
    $inventory_result = mysqli_query($db, $equipment_query);
    header("location: inventories.php");
  } catch (Exception) {
    die("Error Occured!");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Quarantine Centre Management System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/b470dbb387.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link href="../assets/css/custom.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/example_pages/dashboard.html " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Quarantine Centre</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../example_pages/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user-group text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Clients</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-house-chimney-medical text-success text-sm"></i>
            </div>
            <span class="nav-link-text ms-1">Rooms</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-vial text-success text-sm"></i>
            </div>
            <span class="nav-link-text ms-1">Test Results</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Inventry</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../example_pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Admin Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Inventory</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Update Inventory</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Register new equipment</h6>
            </div>
            <div class="card-body pt-0 pb-2">
              <form action="" method="POST">
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>Equipment Id</label>
                    <input type="text" class="form-control" name="equipment_id" value="<?php echo $equipment_id ?>" disabled>
                  </div>
                  <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" <?php if ($isUpdate) echo "value='" . $equipment["name"] . "'"; ?> >
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>status</label>
                    <select class="form-control" name="status">
                      <?php if($isUpdate){?>
                          <option <?php if ( $equipment["status"] == "NORMAL") echo "selected";?> > NORMAL </option>
                          <option <?php if ( $equipment["status"] == "BROKEN") echo "selected";?> > BROKEN </option>
                        <?php } else { ?>
                          <option>NORMAL</option>
                          <option>BROKEN</option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>logged_by</label>
                    <select class="form-control" name="logged_by">
                      <option></option>
                      <?php while ($managed_by_row = mysqli_fetch_array($managed_by_staffs)) { 
                        if($isUpdate){ ?>
                          <option <?php if ($managed_by_row["id"] == $equipment["logged_by"]) echo "selected"; ?>>
                          <?php echo $managed_by_row["id"]; ?>
                        <?php }else{?>
                          <option>
                          <?php echo $managed_by_row["id"]; 
                        }?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <input type="submit" class="btn bg-gradient-primary" value="<?php echo $isUpdate ? "Save" : "Submit" ?>">
                <!-- departue button input -->
                <?php //if ($isUpdate) { ?>
                  <!--input type="submit" class="btn bg-gradient-danger" name="departure" value="Mark as departured"-->
                <?php //} ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="dark-mode-plugin">
    <button class="btn btn-round dark-mode-plugin-button text-dark position-fixed px-3 py-2" onclick="darkMode(this)">
      <i class="fa-solid fa-moon py-2"> </i>
    </button>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.js?v=2.0.0"></script>
</body>

</html>
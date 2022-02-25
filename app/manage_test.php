<?php
include("session.php");
$active_tab = "tests";

$clients_query = "SELECT id FROM client ORDER BY id";
$clients = mysqli_query($db, $clients_query);

if (isset($_GET['id'])) {
  $test_id = $_GET['id'];
  $get_test_query = "SELECT * FROM test WHERE id = '$test_id'";
  $get_test_result = mysqli_query($db, $get_test_query);
  if (mysqli_num_rows($get_test_result) == 1) {
    $test = mysqli_fetch_array($get_test_result);
    $isUpdate = true;
  } else {
    header("location: tests.php");
  }
} else {
  $prev_id_query = "SELECT id FROM test ORDER BY id DESC LIMIT 1";
  $prev_id = mysqli_fetch_array(mysqli_query($db, $prev_id_query));
  $test_id = "TS" . sprintf("%06d", substr($prev_id['id'], 2) + 1);
  $isUpdate = false;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $done_to = mysqli_real_escape_string($db, $_POST['done_to']);
  $done_by = $_SESSION['staff_id'];

  if ($isUpdate) {
    if (isset($_POST['delete'])) {
      $test_query = "DELETE FROM test
        WHERE id = '$test_id'";
    } else {
      $result = mysqli_real_escape_string($db, $_POST['result']);
      $test_query = "UPDATE test SET
        type = '$type',
        result = '$result',
        done_to = '$done_to'
        WHERE id = '$test_id'";
    }
  } else {
    $test_query = "INSERT INTO test VALUES(
      '$test_id', 
      CURDATE(), 
      '$type', 
      'PENDING', 
      '$done_to', 
      '$done_by')";
  }

  try {
    $test_query_result = mysqli_query($db, $test_query);
    header("location: test_results.php");
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
  <?php include("navbar.php"); ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Admin Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Test Results</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Update Test Result</h6>
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
              <h6>Add new test result</h6>
            </div>
            <div class="card-body pt-0 pb-2">
              <form action="" method="POST">
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>Test ID</label>
                    <input type="text" class="form-control" name="test_id" value="<?php echo $test_id; ?>" disabled>
                  </div>
                  <div class="col-md-6">
                    <label>Client</label>
                    <select class="form-control" name="done_to">
                      <option></option>
                      <?php while ($row = mysqli_fetch_array($clients)) { ?>
                        <option <?php if ($isUpdate && $row["id"] == $test["done_to"]) echo "selected"; ?>>
                          <?php echo $row["id"]; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>Test Type</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="PCR" <?php if ($isUpdate && $test["type"] == "PCR") echo 'checked="checked"'; ?>>
                      <label class="custom-control-label">PCR</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="RAT" <?php if ($isUpdate && $test["type"] == "RAT") echo 'checked="checked"'; ?>>
                      <label class="custom-control-label">RAT</label>
                    </div>
                  </div>
                  <?php if ($isUpdate) { ?>
                    <div class="col-md-6">
                      <label>Result</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="result" value="POSITIVE" <?php if ($isUpdate && $test["result"] == "POSITIVE") echo 'checked="checked"'; ?>>
                        <label class="custom-control-label">Positive</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="result" value="NEGATIVE" <?php if ($isUpdate && $test["result"] == "NEGATIVE") echo 'checked="checked"'; ?>>
                        <label class="custom-control-label">Negative</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="result" value="PENDING" <?php if ($isUpdate && $test["result"] == "PENDING") echo 'checked="checked"'; ?>>
                        <label class="custom-control-label">Pending</label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
                <input type="submit" class="btn bg-gradient-primary" value="<?php echo $isUpdate ? "Save" : "Submit"; ?>">
                <!-- delete button input -->
                <?php if ($isUpdate) { ?>
                  <input type="submit" class="btn bg-gradient-danger" name="delete" value="Delete">
                <?php } ?>
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
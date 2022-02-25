<?php
include("session.php");
$active_tab = "client";

$rooms_query = "SELECT id FROM room ORDER BY id";
$rooms = mysqli_query($db, $rooms_query);

if (isset($_GET['id'])) {
  $client_id = $_GET['id'];
  $get_client_query = "SELECT * FROM client WHERE id = '$client_id'";
  $get_client_result = mysqli_query($db, $get_client_query);
  if (mysqli_num_rows($get_client_result) == 1) {
    $client = mysqli_fetch_array($get_client_result);
    $isUpdate = true;
  } else {
    header("location: clients.php");
  }
} else {
  $prev_id_query = "SELECT id FROM client ORDER BY id DESC LIMIT 1";
  $prev_id = mysqli_fetch_array(mysqli_query($db, $prev_id_query));
  $client_id = "CL" . sprintf("%06d", substr($prev_id['id'], 2) + 1);
  $isUpdate = false;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $assigned_room = mysqli_real_escape_string($db, $_POST['assigned_room']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $date_of_birth = mysqli_real_escape_string($db, $_POST['date_of_birth']);
  $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $vaccination_status = mysqli_real_escape_string($db, $_POST['vaccination_status']);
  $dietary_pref = mysqli_real_escape_string($db, $_POST['dietary_pref']);

  if ($isUpdate) {
    if (isset($_POST['departure'])) {
      $client_query = "UPDATE client SET
        departure_date = CURDATE()
        WHERE id = '$client_id'";
    } else {
      $status = mysqli_real_escape_string($db, $_POST['status']);
      $client_query = "UPDATE client SET
        first_name = '$first_name',
        last_name = '$last_name',
        gender = '$gender',
        date_of_birth = '$date_of_birth', 
        contact_no = '$contact_no', 
        address = '$address', 
        vaccination_status = '$vaccination_status', 
        dietary_pref = '$dietary_pref', 
        assigned_room = '$assigned_room',
        status = '$status' 
        WHERE id = '$client_id'";
    }
  } else {
    $client_query = "INSERT INTO client VALUES(
      '$client_id', 
      '$first_name', 
      '$last_name', 
      '$gender', 
      '$date_of_birth', 
      '$contact_no', 
      '$address', 
      '$vaccination_status', 
      '$dietary_pref', 
      '$assigned_room', 
      'NORMAL', 
      CURDATE(),
      NULL)";
  }

  try {
    $client_result = mysqli_query($db, $client_query);
    header("location: clients.php");
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
  <?php include("navbar.php") ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Admin Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Clients</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Update Client</h6>
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
              <h6>Register new client</h6>
            </div>
            <div class="card-body pt-0 pb-2">
              <form action="" method="POST">
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>Client Id</label>
                    <input type="text" class="form-control" name="client_id" value="<?php echo $client_id ?>" disabled>
                  </div>
                  <div class="col-md-6">
                    <label>Assigned Room</label>
                    <select class="form-control" name="assigned_room">
                      <option></option>
                      <?php while ($row = mysqli_fetch_array($rooms)) { ?>
                        <option <?php if ($isUpdate && $row["id"] == $client["assigned_room"]) echo "selected"; ?>>
                          <?php echo $row["id"] ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="John" <?php if ($isUpdate) echo "value='" . $client["first_name"] . "'"; ?>>
                  </div>
                  <div class="col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Doe" <?php if ($isUpdate) echo "value='" . $client["last_name"] . "'"; ?>>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="M" <?php if ($isUpdate && $client["gender"] == "M") echo 'checked="checked"' ?>>
                      <label class="custom-control-label">Male</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="F" <?php if ($isUpdate && $client["gender"] == "F") echo 'checked="checked"' ?>>
                      <label class="custom-control-label">Female</label>
                    </div>
                  </div>
                  <?php if ($isUpdate) { ?>
                    <div class="col-md-6">
                      <label>Status</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="NORMAL" <?php if ($isUpdate && $client["status"] == "NORMAL") echo 'checked="checked"' ?>>
                        <label class="custom-control-label">Normal</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="INFECTED" <?php if ($isUpdate && $client["status"] == "INFECTED") echo 'checked="checked"' ?>>
                        <label class="custom-control-label">Infected</label>
                      </div>
                    </div>
                  <?php } ?>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <label>Date of Birth</label>
                    <input class="form-control" type="date" name="date_of_birth" <?php if ($isUpdate) echo "value='" . $client["date_of_birth"] . "'"; ?>>
                  </div>
                  <div class="col-md-6">
                    <label>Contact Number</label>
                    <input class="form-control" type="text" placeholder="07XXXXXXXX" name="contact_no" <?php if ($isUpdate) echo "value='" . $client["contact_no"] . "'"; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="address" rows="2"><?php if ($isUpdate) echo $client["address"]; ?></textarea>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Vaccination Status</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="vaccination_status" value="NONE" <?php if ($isUpdate && $client["vaccination_status"] == "NONE") echo 'checked="checked"' ?>>
                      <label class="custom-control-label">Not Vaccinated</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="vaccination_status" value="PARTIALLY" <?php if ($isUpdate && $client["vaccination_status"] == "PARTIALLY") echo 'checked="checked"' ?>>
                      <label class="custom-control-label">Partially Vaccinated</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="vaccination_status" value="FULLY" <?php if ($isUpdate && $client["vaccination_status"] == "FULLY") echo 'checked="checked"' ?>>
                      <label class="custom-control-label">Fully Vaccinated</label>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Dietery Preference</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="dietary_pref" value="NON_VEG" <?php if ($isUpdate && $client["dietary_pref"] == "NON_VEG") echo 'checked="checked"' ?>>
                      <label class="custom-control-label">Non-Vegetarian</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="dietary_pref" value="VEG" <?php if ($isUpdate && $client["dietary_pref"] == "VEG") echo 'checked="checked"' ?>>
                      <label class="custom-control-label">Vegetarian</label>
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn bg-gradient-primary" value="<?php echo $isUpdate ? "Save" : "Submit" ?>">
                <!-- departue button input -->
                <?php if ($isUpdate) { ?>
                  <input type="submit" class="btn bg-gradient-danger" name="departure" value="Mark as departured">
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
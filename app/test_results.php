<?php
include("session.php");
$active_tab = "tests";

$tests_query = "SELECT client.first_name AS c_first_name, client.last_name AS c_last_name, client.id AS c_id, test.id, done_by, type, result, date FROM test, client WHERE test.done_to = client.id ORDER BY test.id";
$test_results = mysqli_query($db, $tests_query);
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="dashboard.php">Admin Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Test Results</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Test Results</h6>
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
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>All Test Results</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Test ID</th>
                      <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Client</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tested by</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Test type</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Result</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($test_results)) {
                    ?>
                      <tr>
                        <td>
                          <span class="px-3 text-xs font-weight-bold">
                            <?php echo $row["id"] ?>
                          </span>
                        </td>
                        <td>
                          <div class="d-flex px-3 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">
                                <?php echo $row["c_first_name"] . " " . $row["c_last_name"]; ?>
                              </h6>
                              <p class="text-xs mb-0">
                                <?php echo $row["c_id"]; ?>
                              </p>
                            </div>
                          </div>
                        <td class="align-middle text-center">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $row["done_by"] ?></p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-xs font-weight-bold">
                            <?php echo $row["type"] ?>
                          </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <?php
                          if ($row["result"] == "POSITIVE") {
                            $badge_style = "bg-gradient-danger";
                          } else if ($row["result"] == "NEGATIVE") {
                            $badge_style = "bg-gradient-success";
                          } else {
                            $badge_style = "bg-gradient-warning";
                          }
                          ?>
                          <span class="badge badge-sm <?php echo $badge_style ?> text-capitalize">
                            <?php echo $row["result"] ?>
                          </span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-xs font-weight-bold">
                            <?php echo $row["date"]; ?>
                          </span>
                        </td>
                        <td class="align-middle">
                          <a href="manage_test.php?id=<?php echo $row["id"] ?>" class="font-weight-bold text-xs btn-tooltip" data-toggle="tooltip" data-original-title="Edit test">
                            Edit
                          </a>
                        </td>
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
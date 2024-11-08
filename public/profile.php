
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="images/fav.png">
  <title>
    Farmer Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Sidenav Top -->
    <nav class="navbar bg-slate-900 navbar-expand-lg flex-wrap top-0 px-0 py-0">
      <div class="container py-2">
        <nav aria-label="breadcrumb">
          <div class="d-flex align-items-center">
            <span class="px-3 font-weight-bold text-lg text-white me-4">profile page </span>
          </div>
        </nav>
        <ul class="navbar-nav d-none d-lg-flex">
          <li class="nav-item px-3 py-3 border-radius-sm  d-flex align-items-center">
            <a href="index.html" class="nav-link text-white p-0">
              Home 
            </a>
          </li>
          
          <li class="nav-item px-3 py-3 border-radius-sm  d-flex align-items-center">
            <a href="wallet.phpf" class="nav-link text-white p-0">
              Wallet
            </a>
          </li>
        
        </ul>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav ms-md-auto  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            
            <li class="nav-item d-flex align-items-center ps-2">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              
            </li>
            </a>
            </li>
          </ul>
        </div>
      </div>
      <hr class="horizontal w-100 my-0 dark">
      <div class="container pb-3 pt-3">
        <ul class="navbar-nav d-none d-lg-flex">
          <li class="nav-item border-radius-sm px-3 py-3 me-2 bg-slate-800 d-flex align-items-center">
            <a href="profile.php" class="nav-link text-white p-0">
              Profile
            </a>
          </li>
        
        </ul>
        <div class="ms-md-auto p-0 d-flex align-items-center w-sm-20">
          <div class="input-group border-dark">
            <span class="input-group-text border-dark bg-dark text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
              </svg>
            </span>
            <input type="text" class="form-control border-dark bg-dark" placeholder="Search" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
      </div>
    </nav>
    <!-- End Sidenav Top -->
    <div class="pt-7 pb-6 bg-cover" style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;"></div>
    <div class="container">
      <div class="card card-body py-2 bg-transparent shadow-none">
        <div class="row">
          <div class="col-auto">
            <div class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
              <img src="assets/img/team-2.jpg" alt="profile_image" class="w-100">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h3 class="mb-0 font-weight-bold">
                Noah 
              </h3>
              <p class="mb-0">
                noah@mail.com
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
            <a href="javascript:;" class="btn btn-sm btn-white">update</a>
            <a href="javascript:;" class="btn btn-sm btn-dark">Save</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Profile Information Section -->
<div class="col-12 col-xl-4 mb-4">
  <div class="card border shadow-xs h-100">
    <div class="card-header pb-0 p-3">
      <div class="row">
        <div class="col-md-8 col-9">
          <h6 class="mb-0 font-weight-semibold text-lg">Profile Information</h6>
          <p class="text-sm mb-1">Edit the information about you.</p>
        </div>
        <div class="col-md-4 col-3 text-end">
          <button type="button" class="btn btn-white btn-icon px-2 py-2" id="edit-profile-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
              <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="card-body p-3">
      <form id="profile-form" action="../update.php" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
          <label for="first-name" class="form-label">First Name:</label>
          <input type="text" class="form-control" id="first-name" name="first_name" value="Noah">
        </div>
        <div class="form-group mb-3">
          <label for="last-name" class="form-label">Last Name:</label>
          <input type="text" class="form-control" id="last-name" name="last_name" value="Mclaren">
        </div>
        <div class="form-group mb-3">
          <label for="mobile" class="form-label">Mobile:</label>
          <input type="text" class="form-control" id="mobile" name="mobile" value="+(44) 123 1234 123">
        </div>
        <div class="form-group mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" name="email" value="noah@mclaren.com">
        </div>
        <div class="form-group mb-3">
          <label for="role" class="form-label">Role:</label>
          <select class="form-control" id="role" name="role">
            <option value="Waste Contributor">Waste Contributor</option>
            <option value="Farmer">Farmer</option>
            <option value="Collector">Collector</option>
            <option value="Manufacturer">Manufacturer</option>
            <option value="Consumer">Consumer</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="location" class="form-label">Location:</label>
          <input type="text" class="form-control" id="location" name="location" value="USA">
        </div>
        <div class="form-group mb-3">
          <label for="biodigester" class="form-label">Biodigester Capacity (m³):</label>
          <input type="number" class="form-control" id="biodigester" name="biodigester" value="1000">
        </div>
        <div class="form-group mb-3">
          <label for="gas-production" class="form-label">Gas Production (m³/day):</label>
          <input type="number" class="form-control" id="gas-production" name="gas-production" value="500">
        </div>
        <div class="form-group mb-3">
          <label for="fertilizer-production" class="form-label">Fertilizer Production ( tons/day):</label>
          <input type="number" class="form-control" id="fertilizer-production" name="fertilizer-production" value="200">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
    </div>
  </div>
</div>

<!-- Account Management Section -->
<div class="col-12 col-xl-4 mb-4">
  <div class="card border shadow-xs h-100">
    <div class="card-header pb-0 p-3">
      <div class="row">
        <div class="col-md-8 col-9">
          <h6 class="mb-0 font-weight-semibold text-lg">Account Management</h6>
          <p class="text-sm mb-1">Manage your account settings.</p>
        </div>
        <div class="col-md-4 col-3 text-end">
          <button type="button" class="btn btn-white btn-icon px-2 py-2" id="edit-account-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
              <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8. 199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="card-body p-3">
      <form id="account-form" action="update.php" method="post">
        <div class="form-group mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group mb-3">
          <label for="confirm-password" class="form-label">Confirm Password:</label>
          <input type="password" class="form-control" id="confirm-password" name="confirm-password">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
    </div>
  </div>
</div>

<!-- Service and Product Access Section -->
<div class="col-12 col-xl-4 mb-4">
  <div class="card border shadow-xs h-100">
    <div class="card-header pb-0 p-3">
      <div class="row">
        <div class="col-md-8 col-9">
          <h6 class="mb-0 font-weight-semibold text-lg">Service and Product Access</h6>
          <p class="text-sm mb-1">Manage your access to services and products.</p>
        </div>
        <div class="col-md-4 col-3 text-end">
          <button type="button" class="btn btn-white btn-icon px-2 py-2" id="edit-access-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
              <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="card-body p-3">
      <form id="access-form" action="update.php" method="post">
        <div class="form-group mb-3">
          <label for="waste-contributor" class="form-label">Waste Contributor:</label>
          <input type="checkbox" class="form-check-input" id="waste-contributor" name="waste-contributor">
        </div>
        <div class="form-group mb-3">
          <label for="farmer" class="form-label">Farmer:</label>
          <input type="checkbox" class="form-check-input" id="farmer" name="farmer">
        </div>
        <div class="form-group mb-3">
          <label for="collector" class="form-label">Collector:</label>
          <input type="checkbox" class="form-check-input" id="collector" name="collector">
        </div>
        <div class="form-group mb-3">
          <label for="manufacturer" class="form-label">Manufacturer:</label>
          <input type="checkbox" class="form-check-input" id="manufacturer" name="manufacturer">
        </div>
        <div class="form-group mb-3">
          <label for="consumer" class="form-label">Consumer:</label>
          <input type="checkbox" class="form-check-input" id="consumer" name="consumer">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
    </div>
  </div>
</div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-xs text-muted text-lg-start">
                Copyright
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                Farmer dashboard by
                <a href="" class="text-secondary" target="_blank">warmcuts</a>.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                
                <li class="nav-item">
                  <a href="##" class="nav-link text-xs text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="##" class="nav-link text-xs text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="##" class="nav-link text-xs pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"></i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Farmer connect Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-slate-900" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
  <!-- ... rest of the HTML code ... -->

  <!-- Add the JavaScript code here -->
  <script>
    // Get the profile form and edit button
    const profileForm = document.getElementById('profile-form');
    const editProfileBtn = document.getElementById('edit-profile-btn');

    // Add event listener to the edit profile button
    editProfileBtn.addEventListener('click', function() {
      // Add your code here to handle the edit profile button click event
    });

    // Add event listener to the profile form submission
    profileForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the default form submission behavior
      // Add your code here to handle the form submission
    });
  </script>

</body>
</html>
</body>

</html>
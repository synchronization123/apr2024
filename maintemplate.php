<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    .menu {
      background-color: #f8f9fa;
      color: #495057;
      min-height: 100vh;
    }
    .top-bar {
      background: linear-gradient(to right, #56ccf2, #2f80ed);
      color: #fff;
      padding: 10px;
    }
    .data-section {
      padding: 20px;
    }
    .menu ul {
      padding-left: 0;
    }
    .menu ul li {
      list-style: none;
      padding: 10px 0;
    }
    .menu ul li a {
      color: #495057;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .menu ul li a:hover {
      color: #007bff;
    }
    .logo img {
      width: 100px; /* Adjust the width of the logo */
      height: auto; /* Maintain aspect ratio */
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Left Menu -->
      <div class="col-md-2 menu">
        <div class="logo text-center mb-3">
          <img src="path/to/your/logo.png" alt="abc">
        </div>
        <button class="btn btn-primary btn-block d-md-none mb-3" type="button" data-toggle="collapse" data-target="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu">
          Toggle Menu
        </button>
        <div class="collapse d-md-block" id="collapseMenu">
          <ul class="list-unstyled">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> Assignment</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Admin Settings</a></li>
            <li><a href="#"><i class="fas fa-plus-circle"></i> Create Assignment</a></li>
            <li><a href="#"><i class="far fa-eye"></i> View My Assignment</a></li>
            <li><a href="#"><i class="fas fa-users"></i> View Everyone's Assignment</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            <li><a href="#"><i class="fas fa-laptop"></i> Applications</a></li>
            <li><a href="#"><i class="fas fa-chart-line"></i> Reports</a></li>
            <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Metrics</a></li>
            <li><a href="#"><i class="fas fa-toolbox"></i> Software Tools</a></li>
            <li><a href="#"><i class="fas fa-users-cog"></i> Team Lead Dashboard</a></li>
          </ul>
        </div>
      </div>
      
      <!-- Top Bar -->
      <div class="col-md-10">
        <div class="top-bar">
          <h2>Notification:</h2>
        </div>
        
        <!-- Data Section -->
        <div class="data-section">
          <h3>Data Section</h3>
          <p>This is the content of the data section.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

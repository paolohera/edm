<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: /edm-4c/proj/public/warning.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Tungsten:wght@500&display=swap');

    body {
      font-family: 'DM Sans', sans-serif;
      background-color: #0f1923;
      color: #ece8e1;
    }

    .row.content {
      min-height: 100vh;
    }
    
    .sidenav {
      background-color: #1f2326;
      height: 100%;
      border-right: 1px solid #ff465544;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    .tungsten {
      font-family: 'Tungsten', sans-serif;
    }

    .logo {
      padding: 20px;
      color: #ff4655;
      font-size: 2.5rem;
      letter-spacing: 2px;
      border-bottom: 1px solid #ff465544;
      margin-bottom: 0;
    }

    .nav-pills {
      flex-grow: 1;
    }

    .nav-pills > li > a {
      color: #ece8e1;
      border-radius: 0;
      padding: 15px 20px;
      transition: all 0.3s ease;
      font-size: 14px;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .nav-pills > li > a:hover {
      background-color: rgba(255, 70, 85, 0.1);
      color: #ff4655;
    }

    .nav-pills > li.active > a,
    .nav-pills > li.active > a:focus,
    .nav-pills > li.active > a:hover {
      background-color: rgba(255, 70, 85, 0.2);
      color: #ff4655;
      border-left: 4px solid #ff4655;
    }

    .well {
      background-color: #1f2326;
      border: 1px solid #ff465544;
      border-radius: 2px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      color: #ece8e1;
    }

    .navbar-inverse {
      background-color: #1f2326;
      border-color: #ff465544;
    }

    .navbar-inverse .navbar-brand {
      color: #ff4655;
    }

    .navbar-inverse .navbar-nav > li > a {
      color: #ece8e1;
    }

    .navbar-inverse .navbar-nav > .active > a {
      background-color: rgba(255, 70, 85, 0.2);
      color: #ff4655;
    }

    .stat-number {
      color: #ff4655;
      font-size: 24px;
      font-weight: bold;
    }

    .logout-section {
      padding: 20px;
      border-top: 1px solid #ff465544;
      margin-top: auto;
    }

    .logout-btn {
      width: 100%;
      background: transparent;
      border: 1px solid #ff4655;
      color: #ff4655;
      padding: 10px;
      text-align: center;
      font-weight: 500;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 2px;
      font-size: 14px;
    }

    .logout-btn:hover {
      background: #ff4655;
      color: #ece8e1;
      text-decoration: none;
    }

    .welcome-text {
      color: #ece8e1;
      margin: 20px 0;
      font-size: 18px;
    }

    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .logout-section {
        margin-top: 20px;
        border-top: none;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand tungsten">Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Age</a></li>
        <li><a href="#">Gender</a></li>
        <li><a href="#">Geo</a></li>
        <li><a href="#" onclick="user_Logout()">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2 class="logo tungsten">Dashboard</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Hommie</a></li>
        <li><a href="#section2">Age</a></li>
        <li><a href="#section3">Gender</a></li>
        <li><a href="#section3">Geo</a></li>
      </ul>
      <div class="logout-section">
        <a href="#" class="logout-btn" onclick="user_Logout()">LOGOUT</a>
      </div>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="welcome-text">Welcome, <?php echo htmlspecialchars($username); ?></div>
      <div class="well">
        <h4 class="tungsten" style="color: #ff4655; font-size: 2rem;">DASHBOARD OVERVIEW</h4>
        <p>Monitor your statistics and performance metrics</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Users</h4>
            <p class="stat-number">1M+</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Pages</h4>
            <p class="stat-number">100M</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Sessions</h4>
            <p class="stat-number">10M</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce Rate</h4>
            <p class="stat-number">30%</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <h4 style="color: #ff4655;">Performance</h4>
            <p>Peak Users: 150K</p> 
            <p>Average Time: 45m</p> 
            <p>Retention: 85%</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4 style="color: #ff4655;">Engagement</h4>
            <p>Daily Active: 500K</p> 
            <p>Monthly Active: 2.5M</p> 
            <p>Growth: +15%</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4 style="color: #ff4655;">Activity</h4>
            <p>Messages: 1.2M</p> 
            <p>Posts: 450K</p> 
            <p>Shares: 200K</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <h4 style="color: #ff4655;">Analytics Overview</h4>
            <p>Comprehensive analysis of user behavior and platform performance</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4 style="color: #ff4655;">Status</h4>
            <p>All systems operational</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../lib/js/my.js"></script>
</body>
</html>
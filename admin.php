<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard | Jobs Portal</title>

  <?php 
  include('header_link.php'); 
  include('dbconnect.php'); 
  ?>

  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-container {
      padding: 40px;
      min-height: 90vh;
    }

    .dashboard-header {
      text-align: center;
      margin-bottom: 30px;
      font-size: 32px;
      font-weight: bold;
      color: #6222cc;
    }

    .cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .card {
      background-color: white;
      border-radius: 12px;
      padding: 25px;
      width: 280px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h2 {
      font-size: 40px;
      margin: 0;
      color: #6222cc;
    }

    .card p {
      font-size: 18px;
      margin-top: 10px;
      color: #444;
    }

    .actions {
      margin-top: 50px;
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .actions a {
      padding: 12px 24px;
      background-color: #6222cc;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .actions a:hover {
      background-color: #4b1aa1;
    }
  </style>
</head>
<body>

<?php 
include('header.php'); 

if(!isset($_SESSION['userid'])){
  header('Location: login.php');
}

$empid = $_SESSION['userid'];

// Fetch stats
$jobCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM jobs WHERE empid='$empid'"));
$appCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM application INNER JOIN jobs ON jobs.jobid = application.jobid WHERE jobs.empid='$empid'"));
$categoryCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM categories"));
?>

<div class="dashboard-container">
  <div class="dashboard-header">Welcome to Your Employer Dashboard</div>

  <div class="cards">
    <div class="card">
      <h2><?= $jobCount ?></h2>
      <p>Total Jobs Posted</p>
    </div>
    <div class="card">
      <h2><?= $appCount ?></h2>
      <p>Total Applications Received</p>
    </div>
    <div class="card">
      <h2><?= $categoryCount ?></h2>
      <p>Categories Available</p>
    </div>
  </div>

  <div class="actions">
    <a href="uploadjob.php">➕ Post New Job</a>
    <a href="application.php">📋 View Applications</a>
    <a href="categories.php">🗂 Manage Categories</a>
  </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>

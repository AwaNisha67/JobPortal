<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data['title'] ?> | Job Details</title>
    
    <?php 
    session_start();
    include('dbconnect.php');
    include('header_link.php'); // for CSS/JS consistency
    ?>

    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', sans-serif;
        }

        .job-card {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            margin-top: 60px;
        }

        .job-title {
            font-size: 2rem;
            font-weight: 700;
            color: #6222cc;
        }

        .job-detail {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: #333;
        }

        .apply-btn {
            background-color: #6222cc;
            color: #fff;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1.1rem;
            border: none;
            transition: background-color 0.3s ease;
        }

        .apply-btn:hover {
            background-color: #4a18a1;
            color: #fff;
            text-decoration: none;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #6222cc;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<?php
// Redirect if jobid is missing
if (!isset($_GET['jobid'])) {
    header("Location: index.php");
    exit;
}

$jobid = $_GET['jobid'];

// Fetch job details
$sql = "SELECT * FROM jobs WHERE jobid = '$jobid'";
$rs = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($rs);

if (!$data) {
    echo "<h2>Job not found.</h2>";
    exit;
}
?>

<body>
<?php include('header.php'); ?>

<div class="container9" style="
    display: flex;
    justify-content: center;
">
    <div class="job-card col-md-8 mx-auto">
        <a href="index.php" class="back-link">&larr; Back to Jobs</a>
        <h2 class="job-title mb-4" style="
    text-align: center;
"><?= $data['title'] ?></h2>
        <p class="job-detail"><strong>Description:</strong> <?= $data['description'] ?></p>
        <p class="job-detail"><strong>Salary:</strong> ₹<?= $data['salary'] ?> / month</p>
        <p class="job-detail"><strong>Timing:</strong> <?= $data['timing'] ?></p>
        <p class="job-detail"><strong>Location:</strong> <?= $data['location'] ?></p>

        <?php
        if (isset($_SESSION['type']) && $_SESSION['type'] == 2) {
            echo "<a href='apply.php?jobid=$jobid' class='apply-btn'>Apply Now</a>";
        } else {
            echo '<a href="login.php" class="apply-btn">Login to Apply</a>';
        }
        ?>
    </div>
</div>
<br><br><br>
<?php include('footer.php'); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Job | Jobs Portal</title>
    
    <?php 
    session_start();
    include('header_link.php'); 
    include('dbconnect.php'); 
    ?>

    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            margin-top: 60px;
        }

        .single {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: auto;
        }

        .single h1 {
            font-size: 2rem;
            color: #6222cc;
            margin-bottom: 30px;
        }

        .form-group input[type="file"] {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #6222cc;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4a18a1;
        }
    </style>
</head>
<body>

<?php 
include('header.php');

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit;
}

$jobid = $_GET['jobid'];
$userid = $_SESSION['userid'];
?>

<div class="container">
    <div class="single">
        <h1>Apply for Job</h1>
        <form action="apply.php?jobid=<?= $jobid ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= $jobid ?>" name="jobid">
            <input type="hidden" value="<?= $userid ?>" name="userid">

            <div class="form-group">
                <label>Upload Your Resume (PDF)</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <input type="submit" name="applyjob" value="Submit Application" class="btn btn-primary">
        </form>
    </div>
</div>

<?php 
if (isset($_POST['applyjob'])) {
    $userid = $_POST['userid'];
    $jobid = $_POST['jobid'];

    $file = $_FILES['file']['name'];//original file 
    $tmp = $_FILES['file']['tmp_name'];//temprory file

    $targetDir = "cv/";
    $targetFile = $targetDir . basename($file);

    if (move_uploaded_file($tmp, $targetFile)) {
        $sql = "INSERT INTO `application`(`userid`, `jobid`, `cv`) 
                VALUES ('$userid','$jobid','$file')";
        mysqli_query($con, $sql);

        echo "<script>alert('Application submitted successfully!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Failed to upload file. Please try again.');</script>";
    }
}
?>

<br><br>
<?php include('footer.php'); ?>
</body>
</html>

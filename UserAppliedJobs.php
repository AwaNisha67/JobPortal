<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applied Jobs | Jobs Portal</title>
    <?php 
        include('header_link.php'); 
        include('dbconnect.php'); 
        session_start();
    ?>
    <style>
    .container4 {
        min-height: 250px;
    max-height: 500px;
        margin: 50px auto;
        margin-bottom: 200px;
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        transform: perspective(1000px) rotateX(3deg);
        animation: fadeInUp 1s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInUp {
        0% {
            transform: translateY(40px) perspective(1000px) rotateX(10deg);
            opacity: 0;
        }
        100% {
            transform: translateY(0px) perspective(1000px) rotateX(0deg);
            opacity: 1;
        }
    }

    h1 {
        font-weight: bold;
        margin-bottom: 20px;
        color: #6222cc;
    }

    .th1 {
        background-color: #6222cc;
        color: white;
        text-align: center;
    }

    table.table-striped tbody tr:hover {
        background-color: #f2f2f2;
        cursor: pointer;
        transition: 0.3s ease;
    }

    td {
        vertical-align: middle;
    }
</style>

</head>
<body style="background-color:#6222cc;">

<?php 
    include('header.php'); 

    if(!isset($_SESSION['userid'])){
        header('Location: login.php');
        exit();
    }

    $userid = $_SESSION['userid'];
?>

<div class="container4" style="margin: 50px; margin-bottom: 200px; background: white;">
    <h1 style="text-align: center;">Jobs You've Applied For</h1>
    <div class="single">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="th1">Job ID</th>
                        <th class="th1">Title</th>
                        <th class="th1">Location</th>
                        <th class="th1">Salary</th>
                        <th class="th1">Timing</th>
                        <th class="th1">Company</th>
                        <th class="th1">Applied On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT jobs.jobid, jobs.title, jobs.location, jobs.salary, jobs.timing, 
                                       employer.name AS company_name, application.date
                                FROM application
                                INNER JOIN jobs ON application.jobid = jobs.jobid
                                INNER JOIN employer ON employer.empid = jobs.empid
                                WHERE application.userid = '$userid'";

                        $rs = mysqli_query($con, $sql);
                        if(mysqli_num_rows($rs) > 0){
                            while($data = mysqli_fetch_array($rs)){
                    ?>
                    <tr>
                        <td><?= $data['jobid'] ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><?= $data['location'] ?></td>
                        <td><?= $data['salary'] ?></td>
                        <td><?= $data['timing'] ?></td>
                        <td><?= $data['company_name'] ?></td>
                        <td><?= date('d M Y, h:i A', strtotime($data['date'])) ?></td>
                    </tr>
                    <?php 
                            }
                        } else {
                            echo '<tr><td colspan="7" class="text-center">You haven\'t applied to any jobs yet.</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br><br>
<?php include('footer.php'); ?>
</body>
</html>

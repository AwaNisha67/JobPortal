<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs | Jobs Portal</title>
    
    <?php 
        include('header_link.php'); 
        include('dbconnect.php'); 
        session_start();
    ?>
    
</head>
<body>

<?php 
    include('header.php'); 

    if(!isset($_SESSION['userid'])){
        header('Location: login.php');
        exit();
    }

    $userid = $_SESSION['userid'];
    $type = $_SESSION['type']; // 2 = jobseeker, 1 = employer/admin
?>

<div class="container">
    <h1>All Jobs Posted by Companies</h1>
    <div class="single">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" id="myinput" placeholder="Search jobs..." class="form-control">
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Job ID</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Salary</th>
                        <th>Timing</th>
                        <th>Company</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="mytable">
                    <?php
                        $sql = "SELECT jobs.jobid, jobs.title, jobs.location, jobs.salary, jobs.timing, employer.name AS company_name
                                FROM jobs
                                INNER JOIN employer ON employer.empid = jobs.empid";
                        $rs = mysqli_query($con, $sql);
                        while($data = mysqli_fetch_array($rs)){
                    ?>
                    <tr>
                        <td><?= $data['jobid'] ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><?= $data['location'] ?></td>
                        <td><?= $data['salary'] ?></td>
                        <td><?= $data['timing'] ?></td>
                        <td><?= $data['company_name'] ?></td>
                        <td>
                            <?php 
                                if($type == 2){
                                    echo '<a href="single.php?jobid='.$data['jobid'].'" class="btn btn-primary btn-sm">Apply Now</a>';
                                } else {
                                    echo '<span class="text-muted">Login as Job Seeker</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<br><br>
<?php include('footer.php'); ?>

</body>
</html>

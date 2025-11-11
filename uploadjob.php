<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Job | Jobs Portal</title>
    <?php 
    
    include('header_link.php'); 
    include('dbconnect.php'); 
    ?>
<style>
    body {
    background-color: #6222cc;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.container7 {
    flex: 1;
    padding: 40px 20px;
    max-width: 1300px;
    margin: 0 auto;
}

.single {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 0.8s ease forwards;
    opacity: 0;
    transform: translateY(20px);
    margin-bottom: 60px;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px) perspective(1000px) rotateX(10deg);
    }
    to {
        opacity: 1;
        transform: translateY(0px) perspective(1000px) rotateX(0deg);
    }
}

h1 {
    text-align: center;
    color: #6222cc;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #6222cc;
    box-shadow: 0 0 8px rgba(98, 34, 204, 0.4);
    outline: none;
}

.btn-primary {
    background-color: #6222cc;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 6px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #4a1aa6;
}

.table {
    width: 100%;
    margin-top: 20px;
    background: #fff;
    border-radius: 10px;
    overflow-x: auto;
    display: block;
}

.table th,
.table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
    white-space: nowrap;
}

.table thead {
    background-color: #6222cc;
    color: white;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
    transition: 0.3s;
}

@media (max-width: 992px) {
    .col-md-6 {
        width: 100%;
        display: block;
    }
}
</style>
</head>
<body>

<?php 
    
    include('header.php'); 

    if(!isset( $_SESSION['userid'] ) ){
        header('Location: login.php');
      } 

      
     $empid = $_SESSION['userid'];

    ?>
    <div class="container7" style="
    width: 1200px;
">
    


      <div class="single" style="
    height: 500px;
">
      <h1>Add Jobs</h1>
            <div class="col-md-6">
                 <form action="uploadjob.php" method="post">
                   
                   <div class="form-group">
                   <input type="text" placeholder="enter a name" name="name" class="form-control">  
                   </div>

                   <div class="form-group">
                   <!-- <input type="text" placeholder="enter a categories" name="categories" class="form-control">   -->
                   <select name="catid"  class="form-control">
                        <option value="">Select Categories</option>
                        <?php

                              $sql = "select * from categories";
                              $data = mysqli_query($con,$sql);
                              if(mysqli_num_rows( $data) > 0){
                                    while($rs=mysqli_fetch_array($data)){
                                         ?><option value="<?=$rs['catid']?>"><?= $rs['name']?></option><?php
                                    }
                              }else{
                                   ?><option>No category found</option><?php
                              }

                        ?>

                   </select>
                   </div>


                   <div class="form-group">
                   <input type="text" placeholder="enter a desc" name="desc" class="form-control">
                   </div>

                   <div class="form-group">
                   <input type="text" placeholder="enter a salary" name="salary" class="form-control">
                   </div>

                   <div class="form-group">
                   <input type="text" placeholder="enter a location" name="location" class="form-control">
                   </div>

                   <div class="form-group">
                   <input type="text" placeholder="enter a timing" name="timing" class="form-control">
                   </div>

                    <input type="submit"  name="postjob" value="Post Job" class="btn btn-primary">

                 </form>
              

            </div>

            <div class="col-md-6">
                 <div class="form-group">
                 <input type="text" id="myinput" placeholder="search ......" class="form-control">
                 </div>
               
                 <table class="table">
                      <thead>
                            <tr>
                                 <th>ID</th>
                                 <th>Title</th>
                                 <th>Categories</th>
                                 <th>Description</th>
                                 <th>Timing</th>
                                 <th>Date</th>
                                 <th>Salary</th>
                                 <th>Location</th>
                                 <th>Campany</th>
                                 <!-- <th>Action</th> -->
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "select jobs.*, employer.name, categories.name as 'categories'
                              from jobs
                              inner join employer on employer.empid = jobs.empid
                              inner join  categories on categories.catid = jobs.catid
                              where jobs.empid = '$empid';
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>

                                <tr>
                                      <td><?=$data['jobid']?></td>
                                      <td><?=$data['title']?></td>
                                      <td><?=$data['categories']?></td>
                                      <td><?=$data['description']?></td>
                                      <td><?=$data['timing']?></td>
                                      <td><?=$data['date']?></td>
                                      <td><?=$data['salary']?></td>
                                      <td><?=$data['location']?></td>
                                      <td><?=$data['name']?></td>
                                     
                                </tr>

                           <?php
                              }
                              ?>
                      </tbody>
                 </table>

            </div>

      </div>
 

       <?php 

if(isset($_POST['postjob'])) {
    $empid = $_SESSION['userid'];
    $name = $_POST['name'];
    $catid = $_POST['catid'];
    $desc = $_POST['desc'];
    $salary = $_POST['salary'];
    $timing = $_POST['timing'];
    $location = $_POST['location'];

    $sql = "INSERT INTO `jobs` (`title`, `catid`, `description`, `salary`, `timing`, `location`, `empid`)
            VALUES ('$name', '$catid', '$desc','$salary','$timing','$location','$empid')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Job Posted Successfully'); window.location.href='uploadjob.php';</script>";
        exit;
    } else {
        echo "<script>alert('Failed to upload job');</script>";
    }
}

?>

</div>

<?php include('footer.php'); ?> 


</body>
</html>
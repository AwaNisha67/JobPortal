<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applied Jobs | Jobs Portal</title>
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

.container6 {
    flex: 1;
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.single {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 0.8s ease forwards;
    opacity: 0;
    transform: translateY(20px);
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

.form-group input[type="text"] {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-group input[type="text"]:focus {
    border-color: #6222cc;
    box-shadow: 0 0 8px rgba(98, 34, 204, 0.4);
    outline: none;
}

.table {
    width: 100%;
    margin-top: 20px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
}

.table th, .table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.table thead {
    background-color: #6222cc;
    color: white;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
    transition: 0.3s;
}

@media (max-width: 768px) {
    .table th, .table td {
        padding: 10px;
        font-size: 14px;
    }

    .single {
        padding: 20px;
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
    <div class="container6">
    
          <h1 style="padding: 18px; text-align: center; color: white; border-bottom: 3px solid; ">View Applied Jobs</h1>

      <div class="single" style="height: 350px; max-height: 500px;
">
     

            <div class="col-md-12" style="
    width: 992px;
">
                 <div class="form-group">
                 <input type="text" id="myinput" placeholder="search ......" class="form-control">
                 </div>
               
                 <table class="table">
                      <thead>
                            <tr>
                                 <th>ID</th>
                                 <th>Job</th>
                                 <th>User</th>
                                 <th>CV</th>
                                 <th>Date</th>
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "select application.appid, user.name , jobs.title, employer.empid, application.cv, application.date
                              from application
                              INNER join jobs on jobs.jobid = application.jobid
                              INNER join employer on employer.empid = jobs.empid
                              INNER join user on user.userid = application.userid
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>

                                <tr>
                                      <td><?=$data['appid']?></td>
                                      <td><?=$data['title']?></td>
                                      <td><?=$data['name']?></td>
                                      <td><?=$data['cv']?></td>
                                      <td><?=$data['date']?></td>
                                     
                                </tr>

                           <?php
                              }
                              ?>
                      </tbody>
                 </table>

            </div>

      </div>
 


</div>

<script>
$(document).ready(function(){
  $("#myinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

<br><br>
 <?php include('footer.php'); ?>


</body>
</html>
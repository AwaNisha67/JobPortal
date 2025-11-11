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
    margin: 0;
    padding: 0;
    background-color: #6222cc;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.container8 {
    flex: 1;
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
    min-height: calc(100vh - 100px); /* keeps it from shrinking */
}

.single {
    background-color: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    animation: fadeInUp 0.8s ease-out forwards;
    transform: translateY(20px);
    opacity: 0;
}

@keyframes fadeInUp {
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

h1 {
    text-align: center;
    color: #6222cc;
    margin-bottom: 30px;
    font-size: 28px;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: 0.3s;
}

.form-control:focus {
    border-color: #6222cc;
    outline: none;
    box-shadow: 0 0 8px rgba(98, 34, 204, 0.3);
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #6222cc;
    color: white;
}

.btn-primary:hover {
    background-color: #4a1aa6;
}

.btn-info {
    background-color: #17a2b8;
    color: white;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #bd2130;
}

.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px; /* Adds space between rows */
    table-layout: auto; /* Let table auto-size each column */
}

.table th,
.table td {
    padding: 12px 20px; /* Adds space inside cells */
    text-align: left;
    vertical-align: middle;
    white-space: nowrap; /* Prevent text wrapping in cells */
    background-color: #fff;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #6222cc;
    color: white;
}

.table td a {
    margin-right: 5px; /* Space between Edit and Delete buttons */
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

@media (max-width: 992px) {
    .col-md-6 {
        width: 100%;
        display: block;
        margin-bottom: 30px;
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

     // get data from id 
     error_reporting(0);
     $catid = $_GET['catid'];

     $sql = "select * from categories where catid='$catid'";
     $rs = mysqli_query($con,$sql);
     $catdata = mysqli_fetch_array($rs);

     // delete category
     if(isset($_GET['delcatid'])){
        $catid = $_GET['delcatid'];
        $sql = "delete from categories where catid='$catid'";
        mysqli_query($con,$sql);
        header('Location: categories.php');
     }
     
     ?>
     <div class="container8">
    
      <div class="single" style="height: 500px;">
      <h1>Add Categories</h1>
            <div class="col-md-6">
                 <form action="categories.php" method="post">

                    <!-- for get data from id in view table -->
                   <input type="hidden" name="catid" value="<?= $catdata['catid'] ?>" class="form-control"> 

                   <div class="form-group">
                   <input type="text" placeholder="enter a name" name="Name" value="<?= $catdata['name'] ?>" class="form-control">  
                   </div>

                    <input type="submit"  name="addcat" value="Add Category" class="btn btn-primary">
                    <input type="submit"  name="updatecat" value="Update Category" class="btn btn-info">

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
                                 <th>Name</th>
                                 <th>Action</th>
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "select * from categories";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>

                                <tr>
                                      <td><?=$data['catid']?></td>
                                      <td><?=$data['name']?></td>
                                    
                                      <td>
                                           <a href="categories.php?catid=<?=$data['catid']?>" class="btn btn-info"> Edit</a>
                                           <a href="categories.php?delcatid=<?=$data['catid']?>" class="btn btn-danger"> Delete</a>
                                      </td>
                                </tr>

                           <?php
                              }
                              ?>
                      </tbody>
                 </table>
            </div>
     </div> 

<?php 

           if(isset($_POST['addcat']))
           {

                $catname = $_POST['Name'];
                $sql = "insert into categories (name) values('$catname')";
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Add Category Successfully')</script>";
                }else{
                    echo "<script>alert('Not Added')</script>";
                }
           }
           if(isset($_POST['updatecat']))
           {

                $catid = $_POST['catid'];
                $catname = $_POST['Name'];
                $sql = "update categories set Name='$catname' where catid='$catid'";
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Update Category Successfully')</script>";
                }else{
                    echo "<script>alert('Not Updated')</script>";
                }

           }
?>

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
<!-- footer  -->
 <?php include('footer.php'); ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Jobs Portal</title>

    <?php 
        include('header_link.php'); 
        include('dbconnect.php');
    ?>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #6222cc;
            margin: 0;
            padding: 0;
        }

        .container3 {
            margin: 50px auto;
            margin-bottom: 200px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transform: perspective(1000px) rotateX(3deg);
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
            max-width: 900px;
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
            text-align: center;
            color: #6222cc;
            font-weight: bold;
            margin-bottom: 25px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #6222cc;
            box-shadow: 0 0 8px rgba(98, 34, 204, 0.4);
            outline: none;
        }

        .btn-primary {
            width: 100%;
            background-color: #6222cc;
            border: none;
            padding: 12px;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container3 {
                margin: 30px 15px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<?php include('header.php'); ?>

<div class="container3">
    <div class="row">
        <div class="col-md-6">
            <h1>Employer Register</h1>
            <form action="register.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Enter Name" name="name" class="form-control" required> 
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Enter Email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
                </div>
                <input type="submit" name="empregister" value="Register Employer" class="btn btn-primary">
            </form>
        </div>

        <div class="col-md-6">
            <h1>User Register</h1>
            <form action="register.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Enter Name" name="name" class="form-control" required> 
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Enter Email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
                </div>
                <input type="submit" name="userregister" value="Register User" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php 
if(isset($_POST['empregister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `employer`(`name`, `email`, `password`, `type`) VALUES ('$name','$email','$password','1')";
    mysqli_query($con, $sql);

    echo "<script>alert('Employer Registered Successfully')</script>";
}

if(isset($_POST['userregister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql2 = "INSERT INTO `user`(`name`, `email`, `password`, `type`) VALUES ('$name','$email','$password','2')";
    mysqli_query($con, $sql2);

    echo "<script>alert('User Registered Successfully')</script>";
}
?>

<br><br>
<?php include('footer.php'); ?>
</body>
</html>

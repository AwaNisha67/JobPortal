<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Jobs Portal</title>
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
        min-height: 280px;
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
        text-align: center;
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
        color: #6222cc;
        font-size: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus, input[type="password"]:focus {
        border-color: #6222cc;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
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

    .error-msg {
        color: red;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }

    @media (max-width: 600px) {
        .container3 {
            margin: 30px 15px;
            padding: 25px;
        }
    }
</style>

</head>
<body>

<?php include('header.php'); ?>

<div class="container3" style="margin: 80px; margin-bottom: 200px; background: white;">
    <h1>Employer / User Login</h1>
    <div class="col-md-12">
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter your email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter your password" name="password" class="form-control" required>
            </div>
            <input type="submit" name="login" value="Login" class="btn btn-primary">
        </form>

        <?php 
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT userid,name,email,password,type FROM user WHERE email = '$email' AND password = '$password' 
                        UNION ALL 
                        SELECT empid, name, email , password, type FROM employer WHERE email = '$email' AND password = '$password'";

                $rs = mysqli_query($con, $sql);

                if ($row = mysqli_num_rows($rs) > 0) {
                    $userinfo = mysqli_fetch_array($rs);
                    session_start();

                    $_SESSION['userid'] = $userinfo[0];
                    $_SESSION['email'] = $userinfo[2];
                    $_SESSION['password'] = $userinfo[3];
                    $_SESSION['type'] = $userinfo[4];

                    if ($userinfo[4] == 1) {
                        header('Location: admin.php');
                    } else if ($userinfo[4] == 2) {
                        header('Location: index.php');
                    }
                } else {
                    echo "<div class='error-msg'>Invalid Username or Password</div>";
                }
            }
        ?>
    </div>
</div>

<br><br>
<?php include('footer.php'); ?>
</body>
</html>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">eJob Portal</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="images/logoReal3.jpg" alt="WorkBridge Logo" style="height: 70px; width: auto; margin: -10px;">
            </a>
        </div>

        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
            <ul class="nav navbar-nav" style="margin: 18px;">
                <?php 
                    error_reporting(0);
                    session_start();
                    $type = $_SESSION['type'];

                    if ($type == 1) {
                        echo '
                        <div style=" text-align: center;">
                            <ul style="padding: 0; margin: 0; list-style: none;" class="navBarList">
                                <li style="display: inline; margin: 0 15px;"><a href="admin.php">Dashboard</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="categories.php">Categories</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="uploadjob.php">Jobs</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="application.php">View Application</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="logout.php" style="text-decoration: none; color: #007bff; font-weight: bold;">Logout</a></li>
                            </ul>
                        </div>
                        ';
                    } else if ($type == 2) {
                        echo '
                        <div style=" text-align: center;">
                            <ul style="padding: 0; margin: 0; list-style: none;" class="navBarList">
                                <li style="display: inline; margin: 0 15px; "><a href="index.php" style="text-decoration: none; color: #333; font-weight: bold; font-size: large;">Home</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="UserAppliedJobs.php" style="text-decoration: none; color: #333; font-weight: bold; font-size: large;">View Applied Job</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="logout.php" style="text-decoration: none; color: #007bff; font-weight: bold; font-size: 25px;">Logout</a></li>
                            </ul>
                        </div>
                        ';
                    } else {
                        echo '
                        <div style=" text-align: center;">
                            <ul style="padding: 0; margin: 0; list-style: none;" class="navBarList">
                                <li style="display: inline; margin: 0 15px;"><a href="index.php" style="text-decoration: none; color: #333; font-weight: bold; font-size: large;">Home</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="#" style="text-decoration: none; color: #333; font-weight: bold; font-size: large;">About</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="#" style="text-decoration: none; color: #333; font-weight: bold; font-size: large;">Service</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="#" style="text-decoration: none; color: #333; font-weight: bold; font-size: large;">Contact</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="login.php" style="text-decoration: none; color: #007bff; font-weight: bold; font-size: 25px;">Login</a></li>
                                <li style="display: inline; margin: 0 15px;"><a href="register.php" style="text-decoration: none; color: #28a745; font-weight: bold; font-size: 25px;">Register</a></li>
                            </ul>
                        </div>
                        ';
                    }
                ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</nav>

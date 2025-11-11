<style>
/* Banner section */
.banner {
    position: relative; /* So the wave can sit relative to this */
    background-image: url(images/bg2.png);
    background-size: cover;
    background-position: center;
    min-height: 630px;
    color: white;
    padding: 60px 0;
}

.wave-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    line-height: 0;
    z-index: 0;
}

.wave-bottom img {
    display: block;
    width: 100%;
    height: auto;
    pointer-events: none;
}


#search_wrapper {
    width: 50%;
}

#search_wrapper h1 {
    font-size: 36px;
    margin-bottom: 20px;
    color: white;
}

#search_wrapper input.text {
    padding: 10px;
    width: 80%;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    color: #333;
}

.btn2 input[type="submit"] {
    background-color: #fff;
    color: #2575fc;
    border: none;
    padding: 10px 20px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.btn2 input[type="submit"]:hover {
    background-color: #f2f2f2;
}

#city_1 ul {
    list-style: none;
    padding: 0;
}

#city_1 ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 5px 0;
}

/* Job list section */
.job-card {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    padding: 25px;
    margin: 20px 0;
    transition: transform 0.2s ease, box-shadow 0.3s ease;
}

.job-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.job-card h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.job-card h5 {
    font-size: 16px;
    color: #666;
    margin-bottom: 15px;
}

.job-card p {
    color: #555;
    margin-bottom: 8px;
}

.job-card .btn {
    margin-right: 10px;
}

.container .single .col-md-12 {
    background-color: #f9f9f9;
    padding: 25px;
    margin: 20px 0;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.container .single h1 {
    color: #333;
    font-size: 28px;
}

.container .single h3, .container .single h5 {
    color: #555;
    font-weight: normal;
}

.container .single p {
    color: #666;
    margin-bottom: 10px;
}

.btn-primary {
    background-color: #2575fc;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
}

.btn-primary:hover {
    background-color: #1a5ed8;
}
.title-of-featured-jobs{
    margin-top: 60px;
    text-align: center;
}
@media (max-width: 768px) {
    #search_wrapper {
        width: 100%;
    }

    #search_wrapper input.text {
        width: 90%;
    }

    .container .single .col-md-12 {
        padding: 15px;
    }
}
</style>

<div class="banner" style="padding: 100px 0;">
    <div class="container" style="   width: 600px; margin-left: 0;">
        <h1 style="font-size: 60px;font-weight: bold; margin: 30px;">Kickstart Your Career with WorkBridge</h1>
        <a href="register.php" style="margin: 30px; padding: 15px 40px; font-size: 20px; background-color: #f99746; color: #000; border-radius: 30px; text-decoration: none; font-weight: bold; transition: background 0.3s ease;">
            Apply Now
        </a>
    </div>

    <!-- Optional Wave at the bottom -->
    <div class="wave-bottom" style="margin-top: 60px;">
        <img src="images/bg-bottom.png" alt="wave design" style="width: 100%; height: auto;">
    </div>
</div>


<div class="container">
    <h1 class="title-of-featured-jobs">FEATURED JOBS</h1>
    <div class="single">
        <?php
        include('dbconnect.php');
        $sql = "SELECT * FROM jobs ORDER BY jobid DESC LIMIT 4";
        $rs = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_array($rs)) {
            $_SESSION['jobid'] = $data['jobid'];
        ?>
        <div class="col-md-12 job-card">
    <h2><?= $data['title'] ?></h2>
    <h5 class="text-muted"><?= $data['categories'] ?></h5>
    <p><strong>Description:</strong> <?= $data['description'] ?></p>
    <p><strong>Salary:</strong> <?= $data['salary'] ?></p>
    <p><strong>Timing:</strong> <?= $data['timing'] ?></p>
    <p><strong>Location:</strong> <?= $data['location'] ?></p>

    <?php
    if (isset($_SESSION['type']) && $_SESSION['type'] == 2) {
        echo "<a href='single.php?jobid=" . $data["jobid"] . "' class='btn btn-primary'>Apply Now</a>";
    } else {
        echo '<a href="login.php" class="btn btn-primary">Login</a> ';
        echo '<a href="register.php" class="btn btn-secondary">Register</a>';
    }
    ?>
</div>

        <?php } ?>

        <div style="text-align: center; margin-top: 40px;">
            <a href="viewappjob.php" class="btn btn-success">View All Jobs</a>
        </div>
    </div>
</div>
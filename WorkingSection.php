<style>
    .mid-content{
	    margin: 35px;
    padding: 0 10%;
    padding-bottom: 10px;
    text-transform: capitalize;
}
.elearning h1{
	text-align: center;
	font-size: 52px;
	font-family:'fantasy' sans-serif;
	text-shadow: 0px 3px 5px black;
}
.elearning h3{
	text-align: center;
	font-size: 22px;
	line-height: 2cm;
	font-family: 'fantasy' sans-serif;
}
.containerP2{
	margin: 20px auto;
	padding: 30px;
	display: grid;
    gap: 25px;
    grid-template-columns: repeat( auto-fit ,minmax(275px, 1fr));	
}
.box{
    height: 70px auto;
	padding: 20px;
	text-align: center;
	border-radius: 5px;
	background: white;
	box-shadow:0px 5px 10px rgba(0, 0, 0, 0.2);
}
.box img{
    height: 120px;
    margin: 30px;
}
.box h2{
    font-family: 'Baloo Bhai';
    font-weight: bold;

}
.box p{
    color: darkgray;
    line-height: 2.6;
    text-align: center;
}
.box:hover{

	transition: 0.6s ;
	transform: scale( 1.05);
	/* background-color: rgb(255,200,99); */
	box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.5);
}


</style>

<section class="mid-content">
        <div class="elearning">
           <div id="learning">
            <h1>HOW IT WORKS</h1>
        <div class="containerP2">

        
            <div class="box">
                <img src="images/search.png">
                <h2>Search For Jobs</h2>
                <p>Find jobs that match your skills.</p>
            </div>


            <div class="box">
                <img src="images/cv.png">
                <h2> Apply For Jobs</h2>
                <p>Submit your application in seconds.</p>
            </div>


            <div class="box">
                <img src="images/businessman.png">
                <h2>Get Your Job </h2>
                <p>Land your dream job fast.</p>
            </div>
        </div>  
        <div style="text-align: center; margin-top: 40px;">
            <a href="viewappjob.php" class="btn btn-success">Search Jobs</a>
        </div>
        </div>  
        </div>
    </section>
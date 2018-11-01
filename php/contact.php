<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Boostrap Helper-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-select-country.css">
<!--    <link rel="stylesheet" type="text/css" href="css/bootstrap-formhelpers.css">-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-formhelpers.min.css">
    <!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
	
	<title>LumoSave | Contact Us</title>
</head>
<body class="bg-transparent">
	
<div class="container-fullwidth">
    <nav class="navbar navbar-expand-md ml-auto text-warning bg-dark">
        <div class="container">
            <a class="navbar-brand text-warning" href="../"><i class="far fa-lightbulb" style="color:#ffc107"></i> LumoSave</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <div class="custom-toggler">
                <span class="navbar-toggler-icon"></span>
                </div>
            </button>

            <div class="collapse navbar-collapse " id="myNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-warning" href="../about.html" >About</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="../purchase.html">Purchase</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="../contact.html">Contact Us</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-warning" href="../register.html">Register</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="../login.html">Login</a></li>
                </ul>

            </div>
        </div>
    </nav>
</div>

<main class="container">

<section class="collapse show" data-parent="#pages" id="home">
            <div class="card bg-dark text-light">
                <div class="card-body">
                    <h5 class="card-title">Registration</h5>
                    <p class="card-text text-danger">

<?php
    //collecting inputs from HTML
    $contact_contactName=$_POST['contact_contactName'];
    $contact_groupName=$_POST['contact_groupName'];
    $contact_phone=$_POST['contact_phone'];
    $contact_email=$_POST['contact_email'];
    $contact_message=$_POST['contact_message'];
    
    //connect to mysql
	$mysql_hostname = 'localhost';
	$mysql_user = 'root';
	$mysql_password = 'root';

	//select database
	$mySQL_database = 'lumosave';
    
    mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die ("Couldn't connect to mySQL database.");
	mysql_select_db($mySQL_database) or die ("Couldn't find the database<br>");
    
    //check if email format is incorrect
	if(!filter_var($contact_email,FILTER_VALIDATE_EMAIL)){
		echo "<br>Email format incorrect. Please try again.</br>";
	}                    
    //if email format is correct
	else{ 
		//check fields are not empty
		if (empty($contact_contactName)||empty($contact_groupName)||empty($contact_email)||empty($contact_message)){
			echo "<br>Required fields are empty. Please try again.<br>";
		}
		//if fields are not empty
		else{
            //create record using HTML inputs
            $sql_query = "INSERT INTO contactUs (contactName,contactGroupName,contactPhone,contactEmail,contactMessage) VALUES ('$contact_contactName','$contact_groupName','$contact_phone','$contact_email','$contact_message')";
            $query_result = mysql_query($sql_query);

            if ($query_result){
                echo "<br>Message have been sucessfully sent.<br>";
            }
            else{
                echo "<br>Something went wrong. Please contact the administrator.<br>";
            }
        }
    }
    
?>    


</p>
</div>
</div>
</section>

</main>


<footer class="footer">
    <div class="container-fullwidth bg-dark text-center"> 
        <small class="font-weight-light"><a href="../about.html" class="text-warning" style="text-decoration: none;">About Us</a></small><span class="text-muted">  • </span>
        <small class="font-weight-light"><a href="../contact.html" class="text-warning" style="text-decoration: none;">Contact Us</a></small><span class="text-muted"> •</span>
        
        <small class="font-weight-light"><a href="#" class="text-warning" style="text-decoration: none;"><i class="fab fa-twitter"></i></a></small><span class="text-muted"> •</span>
        <small class="font-weight-light"><a href="#" class="text-warning" style="text-decoration: none;"><i class="fab fa-facebook"></i></a></small><span class="text-muted"> •</span>
        <small class="font-weight-light"><a href="#" class="text-warning" style="text-decoration: none;"><i class="fab fa-instagram"></i></a></small><span class="text-muted"> •</span>
    </div>
</footer>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Bootstrap Helpers -->
<!--<script src="js/bootstrap-formhelpers.js"></script>-->
<script src="js/bootstrap-formhelpers.min.js"></script>

<script>
    $('.navbar-nav>li>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    })
</script>

</body>
</html>
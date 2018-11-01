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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-formhelpers.min.css">
    <!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
	
	<title>LumoSave</title>
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

<section data-parent="#pages" id="home">
            
<?php
	//collecting inputs from HTML
	$login_ID=trim($_POST['login_ID']);
	$login_password=$_POST['login_password'];
	
	//connect to mysql
	$mysql_hostname = 'localhost';
	$mysql_user = 'root';
	$mysql_password = 'root';

	//select database
	$mySQL_database = 'lumosave';
	mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die ("<code>Couldn't connect to mySQL database.");
	mysql_select_db($mySQL_database) or die ("<code>Couldn't find the database</code><br>");

	//query based on email
	$sql_query = "SELECT * FROM users WHERE groupEmail LIKE '$login_ID'";
	$query_result = mysql_query($sql_query);
	$data_size = mysql_num_rows($query_result);

	//if email does NOT exist
//	if ($data_size == 0 OR is_null($data_size)) {
    if (empty($data_size)) {
		echo '<div class="card bg-dark text-light">
                <div class="card-body">
                    <h5 class="card-title">Error</h5>
                    <p class="card-text text-warning">EmailID does not exist</p>
                </div>
              </div>';
	}
	//if email does exist
	else{
		//check password
		$new_record = mysql_fetch_array($query_result);
		$user_password=$new_record['groupPassword'];

		//if password incorrect
		if ($login_password != $user_password) {
            echo '<div class="card bg-dark text-light"><div class="card-body">';
            echo '<h5 class="card-title">Error</h5><p class="card-text text-warning">';
			echo "<br><code>Invalid Password</code></br>";
            echo '</p></div></div>';
		}
		//if password correct
		elseif($login_password == $user_password) {
			//if password correct and admin
			include 'admin.php';

			if(checkadmin($login_ID) == '1'){
				
                echo('<div class="bg-dark">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-warning" id="user-tab" data-toggle="tab" href="#user">Users</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-warning" id="contact-tab" data-toggle="tab" href="#contact"">Contact Requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" id="purchase-tab" data-toggle="tab" href="#purchase">Purchase Requests</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">');
                  
                echo('<div class="tab-pane fade show active" id="user">');
                displayusers();
                echo('</div>');
                echo('<div class="tab-pane fade" id="contact">');
                displayContactUs();
                echo('</div>');
                echo('<div class="tab-pane fade" id="purchase">');
                displayPurchases();
                echo('</div>');
                echo('</div>');
                echo('</div>');
                
                
			}
			//if password correct but not admin
			else{
//				$user_groupName=$new_record['groupName'];
                
                $record_groupPhone = $new_record['groupPhone'];
                $record_groupName = $new_record['groupName'];
                $record_groupEmail = $new_record['groupEmail'];
                $record_memberCount = $new_record['memberCount'];
                $record_groupDistrict = $new_record['groupDistrict'];
                $record_groupCountry = $new_record['groupCountry'];

				echo "<div class='card bg-dark text-light'>
                        <div class='card-body'>
                            <h5 class='card-title'>Welcome Back</h5><p class='card-text text-warning'>
                            <p class='text-warning mb-3'>The following is your group's information:</p>
                        
                            <table class='table table-sm table-bordered table-dark'>
                                <tr>
                                    <td style='width:50%'><p class='text-warning'>Group Name: <span class='font-weight-light text-light'>$record_groupName</span></p></td>
                                    <td style='width:50%'><p class='text-warning'># of Members: <span class='font-weight-light text-light'>$record_memberCount</span></p></td>
                                </tr>
                                <tr>
                                    <td style='width:50%'><p class='text-warning'>District: <span class='font-weight-light text-light'>$record_groupDistrict</span></p></td>
                                    <td style='width:50%'><p class='text-warning'>Country: <span class='font-weight-light text-light'>$record_groupCountry</span></p></td>
                                </tr>
                                <tr>
                                    <td style='width:50%'><p class='text-warning'>Phone: <span class='font-weight-light text-light'>$record_groupPhone</span></p></td>
                                    <td style='width:50%'><p class='text-warning'>Email: <span class='font-weight-light text-light'>$record_groupEmail</span></p></td>
                                </tr>
                            </table>
                        </div>
                      </div>";
			}
		}
		else{
			echo '<div class="card bg-dark text-light"><div class="card-body">';
            echo '<h5 class="card-title">Error</h5><p class="card-text text-warning">';
            echo "<br><code>Something went wrong. Please contact the administrator.</code><br>";
            echo '</p></div></div>';
		}
	}
?>



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
<script src="js/bootstrap-formhelpers.min.js"></script>

<script>
    $('.navbar-nav>li>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    })
</script>

</body>
</html>
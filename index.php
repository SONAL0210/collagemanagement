<?php
	session_start();
	
	require("conection/connect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd' 
								
							");
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="Login trov hery!.....";	
					else
						header("location: everyone.php");
					
			}
			
			else
					$msg="Invalid login authentication, try again!";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>College Portal</title>
</head>

<body>
	<div class="container">
    	<div class="container2">
    		<div class="h1_pos">
    			<h1> ONLY FOR <b>COLLEGE</b> USAGE </h1>
    		</div><br><br><br>
    		<form method="post">
                    <input type="text" class="form-control" name="unametxt" placeholder="Username (default:admin)" title="Enter username here" /><br>
                    <input type="password" class="form-control" name="pwdtxt" placeholder="Password (default:admin)" title="Enter username here" /><br>
    		        <input type="submit" href="#" class="btn btn-default" name="btn_log" value="LOG IN" style="float: right;">
    		<div class="about_pos">
                    <a href="AboutManagement.php" style="text-align:center; color: darkred;"><strong>ABOUT ME</strong></a>
    		</div>
    		</form>
    	</div>
    </div>
	
        <h2 style="color: red; text-align: center;">
            <?php echo $msg; ?>
        </h2>    
</body>
</html>
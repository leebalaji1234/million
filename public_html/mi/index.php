<?php
session_start();
include_once 'config.php';
if(isset($_SESSION['user'])!="")
{
	//header("Location: index.php");
}

if(isset($_POST['login']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$res=mysql_query("SELECT * FROM mp_login WHERE username='$username' and password='$password'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==$password)
	{
		$_SESSION['user'] = $row['userid'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Million Dollar Drawings</title>
		<meta charset="utf-8">
		<link href="css11/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Member Login</h1>
					<div class="head">
						<img src="images11/user.png" alt=""/>
					</div>
				<form method="post">
						<input type="text" class="text" value="USERNAME" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<input type="submit" onclick="myFunction()" value="LOGIN" name="login" >
					</div>	
					<p><a href="#">Forgot Password ?</a></p>
				</form>
			</div>
			<!--//End-login-form-->
			 <!-----start-copyright---->
   					<div class="copy-right">
						<p>Template by <a href="#">way2winsoftware</a></p> 
					</div>
				<!-----//end-copyright---->
		</div>
			 <!-----//end-main---->
		 		
</body>
</html>

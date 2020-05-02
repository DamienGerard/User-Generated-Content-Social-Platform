<?php include 'admin_session_login.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Admin Sign In</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/e279e577b6.js"></script>
	</head>
	<body>
		<?php include '../navbar.php';?>
		<div class="super-main">
			<?php include '../side_column.php';?>
			<div class="user_auth">
				<!--login form-->
				<div class="auth-box" >
					<div class="login">
						<h1>Login</h1>
						<form action="admin_action_login_page.php" method="post" >
							<div class="textbox">
								<i class="fa fa-user" aria-hidden="true"></i><!--italic tag-->
								<input type="text" name="username" placeholder="User name" >
							</div>
							<div class="textbox">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input type="password" name="password" placeholder="8 or more characters">
							</div>
							<input class="btn" type="submit" value="Login" name="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php include '../footer.php';?>
	</body>
</html>
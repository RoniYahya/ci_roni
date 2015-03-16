<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
</head>
<body>
	<form action="<?php echo base_url('index.php/login/logged_in'); ?>" method="post" accept-charset="utf-8">
		<input type="text" name"username">
		<input type="text" name="password">
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>
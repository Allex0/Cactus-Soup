<?php 
include '../navbar.php';
include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../main.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'navbar.php'?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/navbar.css" />
	<link rel="stylesheet" href=".https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/login_register.css">

</head>
<body>
	<div class="container">
		<form action="login_verify.php" method="POST" class="login-email">
			<p class="login-text">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Palavra-passe" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Não tem conta? <a href="register.php">Registar aqui</a>.</p>
		</form>
	</div>
</body>
</html>
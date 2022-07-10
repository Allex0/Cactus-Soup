<?php
include '../navbar.php';

include 'config.php';

error_reporting(0);

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        
        if (!$result -> num_rows > 0) {
            
            $sql = "INSERT INTO users (username, email, password, role) 
                VALUES ('$username', '$email', '$password', 'utilizador')";
            $result = mysqli_query($conn, $sql);
            var_dump($result);
            echo $result;
            if($result)
            {
                $username = "";
                $email = "";
                $password = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                
                 echo '<script type="text/javascript">alert("Registo completo!");
                    location="login.php";</script>';
            }
            else 
            {
                echo '<script>alert("Ops, alguma coisa correu mal!")</script>';
            }
            }
        else
        {
            echo "<script>alert('Este email ja existe!')</script>";
        }
        
    }
    else {
        echo "<script> alert('Password not matched')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7
.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../css/login_register.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Registar</p>
            <div class="input-group">
                <input type="text" placeholder="Nome do utilizador" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Palavra-passe" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirmar palavra-passe" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Registar</button>
            </div>
            <p class="login-register-text">Já tem conta? <a href="login.php"> Login aqui</a>.</p>
        </form>
    </div>
</body>
</html>
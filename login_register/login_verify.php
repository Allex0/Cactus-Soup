<?php 

session_start();
include 'config.php';
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT id, username, role, password FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
      if ($result->num_rows == 1) {
      $_SESSION['id'] = $data[0]['id'];
      $_SESSION['username'] = $data[0]['username'];
      $_SESSION['role'] = $data[0]['role'];
  
  
     header('Location: ../main.php');
  
    }
    else
    {
        
        echo "<script language='javascript'>alert('Os dados inceridos estão errados');window.location.href='login.php';</script>";
      //$_SESSION['naoerror'] = true;
    }
}
?>
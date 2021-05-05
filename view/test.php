<?php
require('config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query) or die(mysql_error());
  
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['type'] = $user['type'];

    if ($user['type'] == 'admin') {
      header('location: admin/home.php');      
    }else{
      header('location: index.php');
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
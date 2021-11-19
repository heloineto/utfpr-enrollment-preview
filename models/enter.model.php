<?php
  session_start();

  if(!empty($_SESSION['auth']) && $_SESSION['auth']) {
    header('Location: dashboard');
    return;
  }

  $error = [
    'invalid-ra' => false,
    'invalid-password' => false,
  ];

  if(empty($_POST))
    return;

  $ra = $_POST['ra'] ?? '';
  $password = $_POST['password'] ?? '';

  require('database/connection.php');
  $database = Connection::get();
  $usersQuery = $database->prepare("SELECT * FROM users WHERE ra=:ra");
  $usersQuery->bindParam(":ra", $ra);
  $usersQuery->execute();
  $users = $usersQuery->fetch(PDO::FETCH_OBJ);

  /* Form validation */
  if(empty($users)) {
    $error['invalid-ra'] = true;

    return;
  }

  if($password != $users->password) {
    $error['invalid-password'] = true;
    
    return;
  }

  $_SESSION['auth'] = true;
  $_SESSION['ra'] = $ra;

  header('Location: dashboard');
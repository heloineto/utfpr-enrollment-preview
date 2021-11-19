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

  /* Form validation */
  if($ra != 'a2165120') {
    $error['invalid-ra'] = true;

    return;
  }

  if($password != 'password') {
    $error['invalid-password'] = true;
    
    return;
  }

  $_SESSION['auth'] = true;
  $_SESSION['ra'] = $ra;

  header('Location: dashboard');
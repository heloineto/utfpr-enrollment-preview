<?php
  session_start();

  if(empty($_SESSION['auth']) || !$_SESSION['auth']) {
      header('Location: enter');
      return;
  }


  $ra = $_SESSION['ra'];

  /* From database */
  $usernames = [
    'a2165120' => 'Heloi Neto',
  ];

  $username = $usernames[$ra] ?? $ra;

  require('database/connection.php');
  $database = Connection::get();
  $subjectsQuery = $database->prepare("SELECT * FROM subjects");
  $subjectsQuery->execute();
  $subjects = $subjectsQuery->fetchAll(PDO::FETCH_OBJ);
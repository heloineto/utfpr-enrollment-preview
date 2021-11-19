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


  $savedQuery = $database->prepare("SELECT * FROM schedules WHERE ra = :ra");
  $savedQuery->bindParam(':ra', $_SESSION['ra']);
  $savedQuery->execute();
  $savedScheduleData = json_decode($savedQuery->fetch(PDO::FETCH_OBJ)->scheduleData);
  print_r($savedScheduleData);

  $enrollError = "";

  if(!empty($_POST)) {
    $scheduleData = $_POST['schedule'];

    if(empty($scheduleData)) {
      $enrollError = "Selecione uma ou mais disciplinas";
      return;
    }

    $scheduleQuery = $database->prepare("DELETE FROM schedules WHERE ra = :ra");
    $scheduleQuery->bindParam(':ra', $_SESSION['ra']);
    $scheduleQuery->execute();

    $scheduleQuery = $database->prepare("INSERT INTO schedules(ra, scheduleData) VALUES (:ra, :scheduleData)");
    $scheduleQuery->bindParam(':ra', $_SESSION['ra']);
    $scheduleQuery->bindParam(':scheduleData', $_POST['schedule']);
    $scheduleQuery->execute();
  }
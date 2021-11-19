<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Use the Inter font family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Use Tailwind CSS via CDN -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  <title>UTF</title>
  <style>
    .selected {
      position: relative;
    }

    .selected:after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-width: 2px;
      border-color: rgba(245, 158, 11, 1);
    }
  </style>
</head>
<body>
<?php
$route = explode('/', substr($_SERVER['REQUEST_URI'], 1));

$resource = empty($route[1]) ? 'enter' : $route[1];
$action = empty($route[2]) ? '' : $route[2];

$controller = "controllers/$resource.controller.php";

if (file_exists($controller)) {
    require($controller);
    return;
}

require("controllers/404.controller.php");

?>
</body>
</html>
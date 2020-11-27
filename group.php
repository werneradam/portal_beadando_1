<!DOCTYPE html>
<html lang="en">

<?php
if (!isset($_SESSION))
  session_start();

if (!isset($_SESSION["userid"]))
  header("Location: login.php");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/group.css">
  <title>Group</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="js/group.js"></script>
</head>

<body class="body">
  <div class="header">
    <form action="group.php" method="POST"><input type="submit" name="group" value="Csoport" class="menu"></form>
    <form action="admin.php" method="POST"><input type="submit" name="admin" value="Admin felület" class="menu"></form>
    <form action="settings.php" method="POST"><input type="submit" name="settings" value="Beállítások" class="menu"></form>
  </div>
  <div class="content">
    <div class="content-header">
      <p class="title" id="content_header_text">Válaszd ki a karácsonyi csoportodat!</p>
    </div>
    <div id="content_body">
      <div class="col-12 create-gorup">
        <div class="col-3">
          <input id="group_event" type="date">
        </div>
        <div class="col-6">
          <input id="groupe_name" type="text">
        </div>
        <div class="col-3">
          <button>Csoport létrehozása</button>
        </div>
      </div>
      <div class="col-12 card-shell">
        <div class="list-card">
          <div class="col-3 group-event-date">2020.08.21.</div>
          <div class="col-6 group-name">Test név</div>
          <div class="col-3 group-join-btn">
            <button id="join">Csatlakozás</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
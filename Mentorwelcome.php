<?php
 session_start();
  if($_SESSION['firstname'] && $_SESSION['lastname']){
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>
    <div class="sessions" style="display: flex; width=100px;">
      <div>
        <?php 
          echo $_SESSION['firstname'];
        ?>
      </div>
      
      <div>
        <?php 
        echo $_SESSION['lastname'];
        ?>
      </div>
    </div>
  </h1>
</body>
</html>
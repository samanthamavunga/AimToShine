<?php require("../Database_Connections/db_cred.php");
  session_start();

  $personid=$_SESSION['person_id'];

  // Create connection
  $conn = new mysqli(servername, username, password, dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT * FROM `person` WHERE person_id='$personid'";

  $results= $conn->query($sql);
  $rows = $results->fetch_assoc();

  if($results->num_rows==1){
    $fname =$rows['firstname'];
    $lname = $rows['lastname'];
  }   
?>

<!doctype html>
<html lang="en">
  <head>
    <title>AimToShine</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styling.css">
  </head>
   <body>
    <section>
      <div class="dashboard">
            <div class="sidebar">
            <span><img src="../assets/img/user.png" alt="home-icon"/><a href="profile.php">Profile</a> </span>
            <span><img src="../assets/img/code-optimisation.png" alt="program-icon"/><a href="mentorship.php">Programs</a> </span>
            <span><img src="../assets/img/donate.png" alt="donor-icon"/><a href="donation.php">View Donations</a> </span>
            <span><img src="../assets/img/assets.png" alt="assets-icon"/><a href="assets.php">View Assets</a> </span>
            <span style="margin-top:150px;"><img src="../assets/img/logout.png" alt="logout-icon"/><a href="../loginselector.php">Logout</a> </span></div>
          <div class="display-dashboard">
              <h1>Welcome <?php echo 'Dear'.' '.$fname.' '.$lname?></h1>
            </div>
        </div>
    </section>
    <footer style="clear:both;">
        
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
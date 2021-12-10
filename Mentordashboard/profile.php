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
    $user_type = $rows['user_type'];
    $username = $rows['username'];
    $gender = $rows['gender'];
    $dob = $rows['DateofBirth']; 
    $location = $rows['location'];
    $pnum = $rows['phonenumber'];
    $email=$rows['email'];
    $psw = $rows['password'];
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
            <span><img src="images/judge.png" alt="home-icon"/><a href="profile.php">Profile</a> </span>
            <span><img src="images/court.png" alt="court-icon"/><a href="mentorship.php">Mentorship Program</a> </span>
            <span><img src="images/lawyer.png" alt="lawyer-icon"/><a href="donation.php">View Donations</a> </span>
            <span><img src="images/head.png" alt="culprit-icon"/><a href="assets.php">View Assets</a> </span>
            <span style="margin-top:150px;"><img src="images/logout.png" alt="logout-icon"/><a href="../loginselector.php">Logout</a> </span>
        </div>
        <div class="display-dashboard">
          <form action="" method=post>
            <h3 class="h3-profile">Profile</h3>
            <div class="container pdiv1"> 
              <div class="row align-items-start" style="float:left; margin-right:100px;">
                <div class="col">
                  <span><p>Name: <?php echo $fname.' '.$lname?></p></span>
                  <span><p>Role: <?php echo $user_type?></p></span>
                  <span><p>Gender: <?php echo $gender?></p></span>
                  <span><p>Dob: <?php echo $dob?></p></span>
                </div>
              </div>
              <div class="row align-items-end" style="float:left;">
                <div class="col">
                  <span><p>Email: <?php echo $email?></p></span>
                  <span><p>Phone Number: <?php echo $pnum?></p></span>
                  <span><p>Location: <?php echo $location?></p></span>
                  <span><p>Username: <?php echo $username?></p></span>
                </div>
              </div>
            </div>
            <div id ="err"><h3 id="error">---</h3>
            </div>
            <h3 class="h3-profile coloring">Edit Profile</h3>
            <div class="container-fluid pdiv1 special-bottom-margin" style="height:400px;">
              <label style="margin-right:10px;">Firstname</label><input type="text" placeholder="Enter fname" value="<?php echo $fname?>" name="fname"><br>
              <label style="margin-right:10px;">Lastname</label><input type="text" placeholder="Enter lname" value="<?php echo $lname ?>" name="lname"><br>
              <label style="margin-right:10px;">Username</label><input type="text" placeholder="Enter username" value="<?php echo $username ?>" name="uname"><br>
              <label style="margin-right:10px;">Email</label><input type="text" placeholder="Enter email" value="<?php echo $email ?>" name="email"><br>
              <label style="margin-right:10px;">DateOfBirth</label><input type="date" placeholder="Enter dob" value="<?php echo $dob ?>" name="dob"><br>
              <label style="margin-right:10px;">Location</label><input type="text" placeholder="Enter location" value="<?php echo $location ?>" name="location"><br>
              <label style="margin-right:10px;">Phone Number</label><input type="text" placeholder="Enter tel" value="<?php echo $pnum ?>" name="pnum"><br>
              <label style="margin-right:10px;">Old password</label><input type="text" placeholder="Enter old password" value="<?php echo "" ?>" name="oldpass"><br>
              <label style="margin-right:10px;">New Password</label><input type="text" placeholder="Enter new password" value="<?php echo ""?>" name="newpass"><br>
              <input type="submit" name="edit" value="Edit" style="
                width:100%;
                background-color:white;
                border:none;
                margin-top:10px;
                border-radius:5px;
                height:40px;
              "
              />
            </div>
          </div>
        </div>
        <?php echo "entering";?>
        <?php
          echo 'collected';
          if(isset($_POST['edit'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $uname=$_POST['uname'];
            $email=$_POST['email'];
            $dob =$_POST['dob'];
            $location=$_POST['location'];
            $pnum=$_POST['pnum'];
            $pass=$_POST['oldpass'];
            $pass2=$_POST['newpass'];
            $passency=md5($pass2);
            
            echo 'collected';

            $sql = "UPDATE `person` 
            SET `firstname`='$fname',`lastname`='$lname',`username`='$uname',`DateofBirth`='$dob',`location`='$location',`phonenumber`='$pnum',`email`='$email',`password`='$passency' 
            WHERE person_id=$personid";
           

            if($pass!=$passency)
            {
              if ($conn->query($sql) === TRUE) {
                ?>
                <script>
                  document.getElementById("error").textContent=<?php  echo "Record updated successfully"?>;

                </script>
                <?php
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }
            } 
          else{
            echo "Do not repeat the same password";
          }
          }
        ?>
      </form>
    </section>
    <footer style="clear:both;">
        <p><img src="images/mace.png" alt="footer-image" class="footer-image"> Crime&Law &copy; 2021</p>
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
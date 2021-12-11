<?php require("./../controllers/user_controller.php");
  session_start();

  $personid=$_SESSION['person_id'];

//   // Create connection
   $conn = new mysqli(servername, username, password, dbname);

//   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 $sql1 = "SELECT * FROM `donor`";
   
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
          <span style="margin-top:150px;"><img src="../assets/img/logout.png" alt="logout-icon"/><a href="../loginselector.php">Logout</a> </span>
        </div>
        <div class="display-dashboard">
          <form action="donation.php" method="post">
            <div class="container-fluid cdiv1" >
              <h3>Donations</h3>
              <input type="submit" class="btn btn-outline-secondary addbutton" name="add" value="Add">
              <input type="submit" class="btn btn-outline-secondary addbutton" name="view" value="Refresh">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="position:relative; ">DonorID</th>
                    <th scope="col" style="position:relative; ">DonorName<th>
                    <th scope="col" style="position:relative; left:-190px">DonorEmail</th>
                    <th scope="col" style="position:relative; left:-150px">DonorAddress</th>
                    <th scope="col" style="position:relative; left:-130px">DonorProvince</th>
                    <th scope="col" style="position:relative; left:-130px">DateDonated</th>
                    <th scope="col" style="position:relative; left:-130px">DonationName</th>
                    <th scope="col" style="position:relative; left:-130px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $results= $conn->query($sql1);
                    if ($results->num_rows > 0) {
                      // output data of each row
                      while($row = $results->fetch_assoc()) {
                        echo "<tr style='
                                line-height:15px;
                                padding: 4px;
                                font-size:14px;
                                font-weight:400;'>";
                        echo "<td>".$row["donor_id"]."</td>
                              <td>".$row["donor_name"]."</td>
                              <td>".$row["donor_email"]."</td>
                              <td>".$row["donor_adress"]."</td>
                              <td>".$row["donor_province"]."</td>
                              <td>".$row["date_donated"]."</td>
                              <td>".$row["donation_name"]."</td>";            
                        ?><td colspan='2'> 
                            <!-- getting specified record to be updated by id. -->
                            <a href="donation.php?editID=<?php echo $row['donor_id'];?>" class='btn btn-success editbutton'>Edit</a>
                          </td>
                        </tr>
                      <?php
                      }   
                    } else {
                        echo "0 results";
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="container-fluid cdiv1 special-bottom-margin" >
              <h3 class='coloring'>Add or Edit Donations</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="position:relative; ">DonorID</th>
                    <th scope="col" style="position:relative; ">DonorName<th>
                    <th scope="col" style="position:relative; left:-110px">DonorEmail</th>
                    <th scope="col" style="position:relative; left:-150px">DonorAddress</th>
                    <th scope="col" style="position:relative; left:-150px">DonorProvince</th>
                    <th scope="col" style="position:relative; left:-150px">DateDonated</th>
                    <th scope="col" style="position:relative; left:-150px">DonationName</th>
                    <th scope="col" style="position:relative; left:-140px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                    //checking if edit button has been clicked.
                    if(isset($_GET['editID'])){
                      $id=$_GET['editID'];

                      $sql = "SELECT * FROM `donor` WHERE donor_id=$id";
                        
                      $results= $conn->query($sql);
                      $rows = $results->fetch_assoc();
                      $donorid = $rows['donor_id'];
                      $donorname =$rows['donor_name'];
                      $donoremail = $rows['donor_email'];
                      $donoraddress = $rows['donor_adress'];
                      $donorprovince = $rows['donor_province'];
                      $datedonated = $rows['date_donated'];
                      $donationname = $rows['donation_name'];
                    }
                  ?>
                  <!-- record to be modified -->
                  <tr class="modify">
                    <td style="visibility:hidden;"><input type="number" placeholder="Enter donor-id" value="<?php echo $donorid ?>" name="donorid"></td>
                    <td><input type="text" placeholder="Enter donor name" value="<?php echo $donorname ?>" name="donorname"></td>
                    <td><input type="text" placeholder="Enter donor email" value="<?php echo $donoremail?>" name="donoremail"></td>
                    <td><input type="text" placeholder="Enter donor address" value="<?php echo $donoraddress ?>" name="donoraddress"></td>
                    <td><input type="text" placeholder="Enter donor province" value="<?php echo $donorprovince ?>" name="donorprovince"></td>
                    <td><input type="date" placeholder="Enter date donated" value="<?php echo $datedonated ?>" name="datedonated"></td>
                    <td><input type="text" placeholder="Enter donation name" value="<?php echo $donationname ?>" name="donationname"></td>
                    <?php
                        //change action once a button is clicked.
                        if(isset($_GET['editID']))
                        {
                          echo "
                            <td colspan='2'>
                              <input type='submit' class='btn btn-outline-secondary modifybutton' name='updaterecord' value='Update'>
                            </td>
                          ";
                        }else if(isset($_POST['add'])){
                          echo "
                            <td colspan='2'>
                              <input type='submit' class='btn btn-outline-secondary modifybutton' name='addrecord' value='Add'>
                            </td>
                          ";
                        }else{
                          echo "
                            <td colspan='2'>
                              <input type='submit' class='btn btn-outline-secondary modifybutton' value='Pending...'>
                            </td>
                          ";
                        }
                      ?>
                  </tr>
                  <small style="margin-left:80px;">
                      <?php
                        //adding record to table.
                        if(isset($_POST['addrecord'])){
                          $donorid = $_POST['donorid'];
                          $donorname =$_POST['donorname'];
                          $donoremail = $_POST['donoremail'];
                          $donoraddress = $_POST['donoraddress'];
                          $donorprovince = $_POST['donorprovince'];
                          $datedonated = $_POST['datedonated'];
                          $donationname = $_POST['donationname'];

                          
                          //query 03 - add
                          $sql3 = "INSERT INTO `donor`(`donor_name`, `donor_email`, `donor_adress`, `donor_province`, `date_donated`, `donation_name`) 
                          VALUES ('$donorname','$donoremail','$donoraddress','$donorprovince','$datedonated','$donationname')";
                          echo $sql3;

                          if (mysqli_query($conn, $sql3)) {
                            echo "<p style='color:green;'>New record created successfully</p>";
                          }else {
                            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                          }
                        }

                        //updating record
                        if(isset($_POST['updaterecord'])){
                          $donorid = $_POST['donorid'];
                          $donorname =$_POST['donorname'];
                          $donoremail = $_POST['donoremail'];
                          $donoraddress = $_POST['donoraddress'];
                          $donorprovince = $_POST['donorprovince'];
                          $datedonated = $_POST['datedonated'];
                          $donationname = $_POST['donationname'];

                          
                          //query 02 - update
                          $sql2 = "UPDATE `donor` 
                          SET `donor_name`='$donorname',`donor_email`='$donoremail',`donor_adress`='$donoraddress',`donor_province`='$donorprovince',`date_donated`='$datedonated',`donation_name`='$donationname' 
                          WHERE donor_id='$donorid'"; 

                          if ($conn->query($sql2) === TRUE) {
                            echo "<p style='color:blue'>Record updated successfully</p>";
                          } else {
                            echo "Error updating record: " . $conn->error;
                          }

                        }
                      ?>
                  </small>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </section>
    <footer style="clear:both;">
        <p><img src="../assets/img/logo.jpeg" alt="footer-image" class="footer-image"> AimToShine &copy; 2021</p>
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
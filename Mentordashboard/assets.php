<?php require("../Database_Connections/db_cred.php");
  session_start();

  $personid=$_SESSION['person_id'];

  // Create connection
  $conn = new mysqli(servername, username, password, dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM `assets`";
   
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
          <form action="assets.php" method="post">
            <div class="container-fluid cdiv1" >
              <h3>Assets</h3>
              <input type="submit" class="btn btn-outline-secondary addbutton" name="add" value="Add">
              <input type="submit" class="btn btn-outline-secondary addbutton" name="view" value="Refresh">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Asset_Code</th>
                    <th scope="col">Asset_Name</th>
                    <th scope="col">Asset_type</th>
                    <th scope="col">DonorID</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $results= $conn->query($sql1);
                    if ($results->num_rows > 0) {
                      // output data of each row
                      while($row = $results->fetch_assoc()) {
                        echo "<tr style='
                                line-height:5px;
                                padding: 2px;
                                font-size:14px;
                                font-weight:400;'>";
                        echo "<td>".$row["asset_code"]."</td>
                              <td>".$row["asset_name"]."</td>
                              <td>".$row["asset_type"]."</td>
                              <td>".$row["donor_id"]."</td>";          
                        ?><td colspan='2'> 
                            <!-- getting specified record to be updated by id. -->
                            <a href="assets.php?editID=<?php echo $row['asset_code'];?>" class='btn btn-success editbutton'>Edit</a>
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
              <h3>Add or Edit Assets</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Asset_Code</th>
                    <th scope="col">Asset_Name</th>
                    <th scope="col">Asset_type</th>
                    <th scope="col">DonorID</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //updating table record.

                    //checking if edit button has been clicked.
                    if(isset($_GET['editID'])){
                      $id=$_GET['editID'];

                      $sql = "SELECT * FROM `assets`";
                      
                      $results= $conn->query($sql);
                      $rows = $results->fetch_assoc();

                      if($results->num_rows==1){
                        $assetcode = $rows['asset_code'];
                        $assetname =$rows['asset_name'];
                        $assettype = $rows['asset_type'];
                        $donorid = $rows['donor_id'];
                      }
                    }
                    $assetname ="";
                    $assettype = "";
                    $donorid = "";
                  ?>
                  <!-- record to be modified -->
                  
                  
                  <tr class="modify">
                    <td><input type="number" placeholder="Enter assetcode" value="<?php echo $assetcode ?>" name="assetcode"></td>
                    <td><input type="text" placeholder="Enter assetname" value="<?php echo $assetname ?>" name="assetname"></td>
                    <td><input type="text" placeholder="Enter assettype" value="<?php echo $assettype ?>" name="assettype"></td>
                    <td><input type="number" placeholder="Enter donor_id" value="<?php echo $donorid ?>" name="donorid"></td>
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
                          $asset=$_POST['assetcode'];
                          $assetname=$_POST['assetname'];
                          $assettype=$_POST['assettype'];
                          $donorid=$_POST['donorid'];

                          
                          //query 03 - add
                          $sql3 = "INSERT INTO `mentorship_content`(`mentor_id`, `mentee_id`, `date_completion`, `mentorship_type`) 
                          VALUES ('$asset','$assetname','$assettype','$donorid')";

                          if (mysqli_query($conn, $sql3)) {
                            echo "<p style='color:green;'>New record created successfully</p>";
                          }else {
                            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                          }
                        }

                        //updating record
                        if(isset($_POST['updaterecord'])){
                          $asset=$_POST['assetcode'];
                          $assetname=$_POST['assetname'];
                          $assettype=$_POST['assettype'];
                          $donorid=$_POST['donorid'];

                          
                          //query 02 - update
                          $sql2 = "UPDATE `assets` 
                          SET `asset_code`='$asset',`asset_name`='$assetname',`asset_type`='$assettype',`donor_id`='$donorid' 
                          WHERE asset_code='$asset'"; 

                          if ($conn->query($sql2) === TRUE) {
                            echo "<p style='color:green'>Record updated successfully</p>";
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

        </div>
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
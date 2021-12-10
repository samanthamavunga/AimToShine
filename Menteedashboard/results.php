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
          <form action="mentorship.php" method="post">
            <div class="container-fluid cdiv1" >
              <h3>Mentorship Program</h3>
              <input type="submit" class="btn btn-outline-secondary addbutton" name="add" value="Add">
              <input type="submit" class="btn btn-outline-secondary addbutton" name="view" value="Refresh">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">MembershipID</th>
                    <th scope="col">MentorID</th>
                    <th scope="col">MenteeID</th>
                    <th scope="col">DateCompletion</th>
                    <th scope="col">MentorshipType</th>
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
                        echo "<td>".$row["membershipID"]."</td>
                              <td>".$row["mentor_id"]."</td>
                              <td>".$row["mentee_id"]."</td>
                              <td>".$row["date_completion"]."</td>
                              <td>".$row["mentorship_type"]."</td>";            
                        ?><td colspan='2'> 
                            <!-- getting specified record to be updated by id. -->
                            <a href="mentorship.php?editID=<?php echo $row['membershipID'];?>" class='btn btn-success editbutton'>Edit</a>
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
              <h3>Add New Membership program</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">MembershipID</th>
                    <th scope="col">MentorID</th>
                    <th scope="col">MenteeID</th>
                    <th scope="col">DateCompletion</th>
                    <th scope="col">MentorshipType</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //updating table record.

                    //checking if edit button has been clicked.
                    if(isset($_GET['editID'])){
                      $id=$_GET['editID'];

                      $sql = "SELECT * FROM `mentorship_content`";
                      
                      $results= $conn->query($sql);
                      $rows = $results->fetch_assoc();

                      if($results->num_rows==1){
                        $membershipID = $rows['membershipID'];
                        $mentorid =$rows['mentor_id'];
                        $menteeid = $rows['mentee_id'];
                        $datecompleted = $rows['date_completion'];
                        $mentorshiptype = $rows['mentorship_type'];
                      }
                    }
                  ?>
                  <!-- record to be modified -->
                  <tr class="modify">
                    <td style="visibility:hidden"><input type="number" placeholder="Enter membershipID" value="<?php echo $membershipID ?>" name="membership"></td>
                    <td><input type="number" placeholder="Enter mentorID" value="<?php echo $mentorid ?>" name="mentorid"></td>
                    <td><input type="number" placeholder="Enter menteeID" value="<?php echo $menteeid ?>" name="menteeid"></td>
                    <td><input type="date" placeholder="Enter date to complete" value="<?php echo $datecompleted ?>" name="datetocomplete"></td>
                    <td><input type="text" placeholder="Enter mentorshiptype" value="<?php echo $mentorshiptype ?>" name="mentorshiptype"></td>
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
                          $mentor=$_POST['mentorid'];
                          $mentee=$_POST['menteeid'];
                          $dtoc=$_POST['datetocomplete'];
                          $mentorshiptype=$_POST['mentorshiptype'];

                          
                          //query 03 - add
                          $sql3 = "INSERT INTO `mentorship_content`(`mentor_id`, `mentee_id`, `date_completion`, `mentorship_type`) 
                          VALUES ('$mentor','$mentee','$dtoc','$mentorshiptype')";

                          if (mysqli_query($conn, $sql3)) {
                            echo "<p style='color:green;'>New record created successfully</p>";
                          }else {
                            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                          }
                        }

                        //updating record
                        if(isset($_POST['updaterecord'])){
                          $mentor=$_POST['mentorid'];
                          $mentee=$_POST['menteeid'];
                          $dtoc=$_POST['datetocomplete'];
                          $mentorshiptype=$_POST['mentorshiptype'];

                          
                          //query 02 - update
                          $sql2 = "UPDATE `mentorship_content` 
                          SET `mentor_id`='$mentor',`mentee_id`='$mentee',`date_completion`='$dtoc',`mentorship_type`='$mentorshiptype',`membershipID`='$mem' 
                          WHERE membershipID='$mem'"; 

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
    </section>
    <footer style="clear:both;">
        <p><img src="images/mace.png" alt="footer-image" class="footer-image"> AimToShine &copy; 2021</p>
    </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
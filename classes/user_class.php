<!--any sql query pertaining to the user, anything about the user 
inserting new user
class user will extent the connection, require that
Class user extend database->

<?php
//connect to database class
require_once (dirname(__FILE__)).'/../Database_Connections/db_class.php';

class User extends db_connection
{
  // register user
  function register_new_user($fname, $lname, $user_type, $username, $gender, $dob, $location, $pnum, $email, $psw)
  {
    $sql="INSERT INTO `person`(`firstname`, `lastname`, `user_type`, `username`, `gender`, `DateofBirth`, `location`, `phonenumber`, `email`, `password`) VALUES ('$fname', '$lname','$user_type','$username','$gender','$dob','$location', '$pnum', '$email', '$psw')";
     
    
    return $this->db_query($sql);
     
  }

  
  // verify user username
  public function verify_username($username){
      $sql = "SELECT * FROM `person` WHERE `username`='$username'";
      return $this->db_query($sql);
  }

  // verify user email
  public function verify_email_fxn($email)
  {
    $sql = "SELECT * FROM `person` WHERE `email`='$email'";
    return $this->db_query($sql);
  }



 //get sername of my user
  public function getUserWithUsername($username)
  {
    $sql="SELECT * FROM `person` WHERE `username`='$username'";
    return $this->db_query($sql);
  }
}
?>
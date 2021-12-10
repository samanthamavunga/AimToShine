<?php
//connect to user controller
include_once("./../controllers/user_controller.php");

$errors = array();               // track errors
session_start();                 // start session

if (isset($_GET["submit"])) 
{
    // Grab form inputs
    $username = $_GET["username"];
    $password = $_GET["password"];

    if (empty($username)) 
    {
        array_push($errors, "username is required");
    }
    if (empty($password)) 
    {
        array_push($errors, "password is required");
    }

    

    //check if username is in database
    $verify_username = verify_username($username);
    if ($verify_username) 
    {
        array_push($errors, "username does not exist in our database");
    }

    // get the username with the email provided
    $getuser = getUserWithUsername($username);
    echo $getuser['username']."<br>";
    echo $username."<br>";
    echo $getuser['password']. "<br>";
    echo md5($password)."<br>";
    echo $getuser['user_type']. "<br>";

    //check if getuser returned an actual user
    if ($getuser != false) 
    {
        // check if username and password of getuser match that of the form && check the user_type status
        //check if user is mentee
        if ($getuser['username'] == $username && $getuser['password'] == md5($password) && $getuser['user_type'] == 'mentee') 
        {
            // set sessions 
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $getuser['user_type'];
            $_SESSION['firstname'] = $getuser['firstname'];
            $_SESSION['lastname'] = $getuser['lastname'];

        } 
        
        //check if the user is a mentor and password and username match
        elseif ($getuser['username'] == $username && $getuser['password'] == md5($password) && $getuser['user_type'] == 'mentor') 
        {
          $_SESSION['username'] = $username;
          $_SESSION['user_type'] = $getuser['user_type'];
          $_SESSION['firstname'] = $getuser['firstname'];
          $_SESSION['lastname'] = $getuser['lastname'];
          $_SESSION['person_id']=$getuser['person_id'];
          
            
        } 
        else {
            // if form data don't match that of getuser
            array_push($errors, "username or password is incorrect");
        }
    }

     if (count($errors) == 0) 
     {
      echo "successful";
         header("location: ./../src.php");
     } else {
    
    //     // store errors inside session
         $_SESSION["errors"] = $errors;
    //     echo "unsuccessful";
        header("location: ./../loginselector.php");
     }
}

?>
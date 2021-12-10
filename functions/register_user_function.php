
<?php
//connect to controller
require_once (dirname(__FILE__)).'/../controllers/user_controller.php';

// keep track of errors
$errors = array();

// check if the button has been clicked
if(isset($_POST["register"]))
{

    // grab form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user_type = $_POST['user_type'];
    $username = $_POST['uname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob']; 
    $location = $_POST['loc'];
    $pnum = $_POST['pnum'];
    $email=$_POST['email'];
    $psw = $_POST['password'];
    $psw_repeat= $_POST['password2'];
    

    // validate data
    // check if fields are empty

    //for fname
    if(empty($fname))
    {
      array_push($errors, "firstname is required");
     }
     

    //for lname 
    if(empty($lname))
    {
      array_push($errors, "Lastname is required");
     }

     //for usertype check
     if(empty($user_type))
     {
       array_push($errors, "usertype is required");
      }
      
       //for username check
      if(empty($username))
      {
        array_push($errors, "username is required");
       }

     //for gender check
    if(empty($gender))
    {
        array_push($errors, "please select gender, is required");
    }

    // date of birth check
    if(empty($dob)){
        array_push($errors, "dob is required"); 
    }


    //for location confirmation
    if(empty($location))
    {
        array_push($errors, "location is required");
    }


    //for phonenumber check
    if(empty( $pnum ))
    {
        array_push($errors, "Phone number is requried");
    }

    //for email check
    if(empty( $email ))
    {
        array_push($errors, "Email is requried");
    }


    //for password
    if(empty($psw))
    {
        array_push($errors, "Password is requried");
    }
    

    //for password confirmation
    if(empty($psw_repeat))
    {
      array_push($errors, "password confirmaton is requried");
    }

    // check if email already exists
    //$verify_email = verify_email_fxn($email);
    //if(!$verify_email){
       // array_push($errors, "email already exists");
    //}


    // check if username already exists
    $verify_username = verify_username($username); 
    if(!$verify_username){
        array_push($errors, "Username already exists");
    }

    // check if fields are of appropriate length
    if(strlen($username) > 100){
        array_push($errors, "username must be shorter than 100 characters");
    }

    if(strlen($email) > 100)
    {
        array_push($errors, "email must be shorter than 100 characters");
    }


    if(strlen($psw) > 15){
        array_push($errors, "password must be shorter than 100 characters");
    }

    // check if passwords are the same
    if($psw != $psw_repeat){
        array_push($errors, "passwords need to match");
    }


    //validate username with regex
    //$regex1 = '([A-Z])\w+';
    // set an error if not a valid username address
    //if(!preg_match($regex1, $username)){
      // array_push($errors, "Your username is not valid. Only characters A-Z are  acceptable.");
   // }


    // validate email with regex
    $regex2 = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // set an error if not a valid email address
    if(!preg_match($regex2, $email)){
        array_push($errors, "enter a valid email address");
    }

     

    // if form is okay
    if(count($errors) == 0)
    {
        // encrypt password
        $psw = md5($psw);

        // register the new user
        $register_user = register_new_user($fname, $lname, $user_type, $username, $gender, $dob, $location, $pnum, $email, $psw);

        // check if user is registered
        if(!$register_user){
            echo "failed";
        }else{
            //echo "success";
            header("location: ../loginselector.php");
            // redirect
        }
        
        
    }
    else{
        session_start();
        // store the errors inside session
        $_SESSION["errors"] = $errors;
        header("location: ../Registration.php");
    }

}
?>
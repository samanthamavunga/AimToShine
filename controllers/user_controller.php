<!--this what is going to call the class methods 
-->

<?php
//connect to database class
require_once (dirname(__FILE__)).'/../classes/user_class.php';

function register_new_user($fname, $lname, $user_type, $username, $gender, $dob, $location, $pnum, $email, $psw)
{
    // create a new instance of user object
    $user = new User;

    // run the query
    $run_query = $user->register_new_user($fname, $lname, $user_type, $username, $gender, $dob, $location, $pnum, $email, $psw);

    // if successful
    if($run_query)
    {
        return $run_query;
    }else{
        return false;
    }
}

function verify_username($username)
{
    // create a new instance of user object
    $user = new User;

    // run the query
    $run_query = $user->verify_username($username);

    // if successful
    if($run_query)
    {
        // fetch data from database
        $user_username = $user->db_fetch();
        if(empty($user_username))
        {
            // if empty means the username isn't in the database already
            return true;
        }
        else{
            return false;
        }
    }else{
        return false;
    }
}


    function verify_email_fxn($email)
    {
        // create a new instance of user object
        $user = new User;
    
        // run the query
        $run_query = $user->verify_email_fxn($email);
    
        // if successful
        if($run_query)
        {
            // fetch data from database
            $user_email = $user->db_fetch();
            if(empty($user_email))
            {
                // if empty means the email isn't in the database already
                return true;
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }





function getUserWithUsername($username)
{
    // create a new instance of user object
    $user = new User;

    // run the query
    $run_query = $user->getUserWithUsername($username);

    // if successful
    if($run_query)
    {
        // fetch data from database
        $user_username = $user->db_fetch();
        if(!empty($user_username))
        {
            // if empty means the username isn't in the database already
            return $user_username;
        }
        else{
            return false;
        }
    }else{
        return false;
    }

}

?>
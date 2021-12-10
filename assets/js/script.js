/*
<?php require('db_cred.php');
    // start session so that the errors can be available in this file
    //create connection
    $conn=new mysqli(servername, username, password, dbname);

    //check connection 
    if($conn->connect_error){
      die("Connection failed:".$conn->connect_error);
    }
?>


<!--This php will insert into the database--->
<?php
  //query
  if(isset($_POST['register']))
  {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['uname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob']; 
    $location = $_POST['loc'];
    $street_name = $_POST['street_loc'];
    $par = $_POST['par'];
    $sch = $_POST['sch'];
    $randominfor =$_POST['randominfor'];
    $pnum = $_POST['pnum'];
    $psw = $_POST['password'];
    $psw_repeat= $_POST['password2'];
    $image = $_POST['image'];
    
    echo "obtined items";
    if($psw==$psw_repeat)
    {
        $sql="INSERT INTO `register`(`firstname`, `lastname`, `username`, `gender`, `dob`, `location`, `street_name`, `parentname`, `school`, `randominfor`, `phonenumber`, `password`, `image`) VALUES ('$fname', '$lname','$username','$gender','$dob','$location','$street_name','$par','$sch','$randominfor','$pnum','$psw','$image')";
        
        if ($conn->query($sql) === TRUE) {
            header("location:login.php");
    } 
        else {echo "not connecting";}                               
    }
    else{
        echo "<p style='color:red;'Passwords don't match or some fields are empty</p>";}
  }
?>

*/

// Select UI elements or inputs
const form = $('#form');
const fname = $('#fname');
const lname = $('#lname');
const user_type = $('#user_type');
const username = $('#username');
const gender = $('#gd');
const dateofbirth = $('#dob');
const location = $('#loc');
const email = $('#email');
const password = $('#password');
const password2 = $('#password2');


// error count
let errors = 0;

// show input error message
const showError = (displayPlace, message) => {
    displayPlace.html(message);
    errors += 1;
}

// check for required field
const checkRequired = (inputArr) => {
    
    inputArr.forEach(function(input){
        if(input.val() === '') {
            showError(input.next(), `${input.attr('id')} field is required`);
        }
    })
}

// check for input length
const checkInputLength = (input, min, max) => {

    if(input.val().length <= min){
        showError(input.next(), `${input.attr('id')} must be more than ${min} characters long`);
    } else if( input.val().length >= max){
        showError(input.next(), `${input.attr('id')} must be less than ${max} characters long`);
    }
}

const checkEmail = (input) => 
{
    const regex2 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!regex2.test(input.val()))
    {
        showError(input.next(), 'Email is not valid');
    }
}


const checkPasswordMatch = (password1, password2) => 
{
    if(password1.val() != password2.val())
    {
        showError(password2.next(), 'Your passwords do not match');
    }
}

const validateform= (e) =>{
    alert('hello');
    //e.preventDefault();
    $('small').html('');
    errors = 0;

    // TODO check for required inputs
    checkRequired([username, email, password, password2,dateofbirth,gender]);
    // TODO check for username length
    checkInputLength(username, 5, 20);
    // TODO check for password length
    checkInputLength(password, 5, 15);

     // TODO check for valid email
     checkEmail(email);

    // TODO check if the passwords match
    checkPasswordMatch(password, password2);

    if(errors === 0){
        return true;
    }else{
        return false;
    }
}
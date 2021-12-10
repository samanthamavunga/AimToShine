<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['user_type'])){
    if($_SESSION['user_type']=="mentor"){
        header("location: Mentordashboard/mentordashboard.php");
    }elseif($_SESSION['user_type']=="mentee"){
        header("location: Menteedashboard/menteedashboard.php");
    }

}else{
    header("location: loginselector.php");
}
?>
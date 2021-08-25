<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login");
    exit;
}

require_once '../app/core.php';

$username=$_SESSION["username"];

        $sql = "UPDATE users SET member='yes' WHERE username='$username'";

        if(mysqli_multi_query($link, $sql)){
        header("location: /dashboard/welcome");
         }else{
         echo "<div class='alert alert-danger'>Query Failed.</div>";
        }
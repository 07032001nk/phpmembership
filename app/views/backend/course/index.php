<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once '../../../core.php';
head3();

$username=$_SESSION["username"];

$sql = "SELECT * FROM users WHERE username='$username'";

$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        define("MEMBER", $row["member"]);
    }
}

else
{
    echo "0 results";
}

?>

<?php
                if(MEMBER=='')
                {
                    header("location: /dashboard/welcome");
                }
                elseif(MEMBER=='yes')
                {
                    ?>

<a href="/dashboard/welcome" class="btn btn-sm btn-dark mb-3">
        &larr; Go Back
</a>

<h1>Course Homepage</h1>

<div class="alert alert-primary">
        You can see all the course lessons either down below or on the right sidebar.
</div>




<?php
                }
                else{
                        echo "error";
                }
            ?>

<?=foot3()?>
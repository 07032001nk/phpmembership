<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once '../../core.php';head2();

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

<div class="container">
<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="/reset-password" class="btn btn-warning">Reset Your Password</a>
        <a href="/logout" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    <hr/>
    <div>
        <h3>If member</h3>
        <p>
            <?php
                if(MEMBER=='')
                {
                    ?>
                    <span>You are not a member.</span> <br>
                        <a href="/buy" class="btn btn-success btn-lg">Buy Now</a>
                    <?php
                }
                else
                {
                    ?>
                    <span>You are a great member</span> <br>
                        <a href="/course" class="btn btn-light btn-lg border">
                             Access Course
                        </a>
                    <?php
                }
            ?>
        </p>
</div>
</div>
<?=foot2()?>
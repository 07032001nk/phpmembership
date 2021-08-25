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
<h1 class="my-5">Listen Craefully, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, you have to buy this course if you are really serious about CSE..</h1>
<h5>If you're not so serious, leave please.</h5>   
<hr/>
    <div>
        <h3>Complete foundational course</h3>
        <p>
            <?php
                if(MEMBER=='')
                {
                    ?>

                        <form>
                                <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HpQM6V4dn3IIi8" async> </script>
                        </form>

                    <?php
                }
                else
                {
                    header("location: /dashboard/welcome");
                }
            ?>
        </p>
</div>
</div>
<?=foot2()?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login");
    exit;
}

require_once '../app/core.php';

head2();

$username=$_SESSION["username"];

$payment_id=$_GET["payment_id"];

if(!isset($payment_id))
{
        header("location: /logout");
        //echo "not done";
}

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

    <div>
        <p>
            <?php
                if(MEMBER=='')
                {
                    ?>

                    <h1 class="text-success">Payment Successful...</h1>

                        <form class="col-6" action="/pay/member_update.php" method ="POST">
                                <label for="">Payment ID</label>
                                <input class="form-control mb-3" type="text" name="payment_id" value="<?=$payment_id;?>"disabled>        
                                <input type="submit" class="btn btn-success" value="Complete Registration">
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
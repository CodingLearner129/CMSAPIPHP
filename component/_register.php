<?php
include "./_dbconnect.php";

$message = "";
$status = false;

if (isset($_POST["register"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];

        if ($password == $confirmPassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            //Webs@123
            $query = "INSERT INTO `company` (`company_username`, `company_password`) VALUES('$username', '$hash')";

            $result = mysqli_query($conn, $query);
            if ($result == TRUE) {
                $message = "Register successfully...";
                $status = true;
            ?>
                <!-- <script>
                alert('Register successfully...');
            </script>; -->
                <script>
                    window.location.href = '../login.php?message=<?php echo $message ?>&status=<?php echo $status; ?>';
                </script>";
            <?php
            } else {
                //alert('Registration failed!!!');
                $message = "Registration failed!!!";
                $status = false;
            ?>
                <script>
                    window.location.href = '../register.php?message=<?php echo $message ?>&status=<?php echo $status; ?>';
                </script>";
            <?php
                // echo "<script>  window.location.href = '../register.php?message='" . $message. "'&status='" . $status . "';</script>";
            }
        } else {
            // alert('Confirmpassword must same as password!!!');
            $message = "Confirmpassword must same as password!!!";
            $status = false;
            ?>
            <script>
                window.location.href = '../register.php?message=<?php echo $message ?>&status=<?php echo $status; ?>';
            </script>";
<?php
            // echo "<script> window.location.href = '../register.php?message='" . $message. "'&status='" . $status . "';</script>";
        }
    
}
$conn->close();
?>
<!-- $sql = "SELECT * FROM `company` WHERE `company_username` = '$username'";
    $resultSql = mysqli_query($conn, $sql);
    if ($resultSql == TRUE) {
        if ($resultSql->num_rows > 0) {
            $message = "Username already exist!!!";
            $status = false;
?>
            <script>
                window.location.href = '../register.php?message=<?php //echo $message ?>&status=<?php //echo $status; ?>';
            </script>";
            <?php
        //}
   // } else {
    //} -->
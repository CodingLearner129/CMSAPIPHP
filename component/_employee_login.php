<?php
include "./_dbconnect.php";
session_start();

$message = "";
$status = false;

if (isset($_POST["employeeLogIn"])) {
    $username = $_POST['ename'];
    $password = $_POST['epassword'];

    $sql = "SELECT * FROM `employee` WHERE `employee_name`='$username'";

    $resultSql = mysqli_query($conn, $sql);

    if ($resultSql == TRUE) {
        if ($resultSql->num_rows > 0) {
            while ($rowSql = $resultSql->fetch_assoc()) {
                $dbPass = $rowSql["employee_password"];
                // echo $dbPass;
                // $pass_Decode = password_verify($password, $dbPass);
                // echo $pass_Decode;
                if ($password == $dbPass) {
                    $_SESSION['eid'] = $rowSql['id'];
                    $message = "Log in successfully...";
                    $status = true;
?>
                    <script>
                        window.location.href = '../employee.php?eid=<?php echo $_SESSION['eid']; ?>&message=<?php echo $message ?>&status=<?php echo $status; ?>';
                    </script>";
                <?php
                } else {
                    // echo "<script> alert('Invalid Password!!!'); window.location.href = 'log_in.php'; </script>";
                    $message = "Invalid Password!!!";
                    $status = false;
                ?>
                    <script>
                        window.location.href = '../login.php?message=<?php echo $message ?>&status=<?php echo $status; ?>';
                    </script>";
            <?php
                }
            }
        } else {
            // echo "<script> alert('Register first!!!'); window.location.href = 'sign_up.php'; </script>";
            $message = "Please contact to your company for this!!!";
            $status = false;
            ?>
            <script>
                window.location.href = '../login.php?message=<?php echo $message ?>&status=<?php echo $status; ?>';
            </script>";
        <?php
        }
    } else {
        // echo "<script> alert('Log in failed!!!'); window.location.href = 'log_in.php'; </script>";
        $message = "Log in failed!!!";
        $status = false;
        ?>
        <script>
            window.location.href = '../login.php?message=<?php echo $message ?>&status=<?php echo $status; ?>';
        </script>";
<?php
    }
}
$conn->close();
?>
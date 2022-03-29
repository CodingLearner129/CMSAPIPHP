<?php
include "./_dbconnect.php";
session_start();

$message = "";
$status = false;

if (isset($_POST["save_empdata"])) {
    $name = $_POST["empname"];
    $email = $_POST["empemail"];
    $pass = $_POST["emppass"];
    $phone = $_POST["empphone"];
    $gender = $_POST["empgender"];
    $dob = $_POST["empdob"];
    $image = $_FILES['file']['name'];
    $image_loc = $_FILES['file']['tmp_name'];
    $cid = $_POST["cid"];

    $folder = "../assets/img/";
    $mainFolder = "assets/img/";

    if ($image != "") {
        $mImage = $mainFolder . $image;
    } else {
        $message = "Please choose image!!!";
        $status = false;
    ?>
<script>
window.location.href =
    '../index.php?id=<?php echo $_SESSION['id']; ?>&message=<?php echo $message ?>&status=<?php echo $status; ?>';
</script>";
<?php
    }
    // echo $name . " " . $email . " " . $pass . " " . $phone . " " . $gender . " " . $dob . " " . $mImage . " " . $cid;

    $sql = "INSERT INTO `employee`(`employee_name`, `email`, `employee_password`, `phone`, `gender`, `dob`, `profile`, `company`) VALUES('{$name}', '{$email}', '{$pass}', '{$phone}', '{$gender}', '{$dob}', '{$mImage}', '{$cid}')";

    $resultSql = mysqli_query($conn, $sql);

    if ($resultSql == TRUE) {
        move_uploaded_file($image_loc, $folder . $image);
        $message = "Record Inserted Successfully...";
        $status = true;
?>
<script>
window.location.href =
    '../index.php?id=<?php echo $_SESSION['id']; ?>&message=<?php echo $message ?>&status=<?php echo $status; ?>';
</script>";
<?php
    } else {
        $message = "Record Not Inserted Successfully!!!";
        $status = false;
    ?>
<script>
window.location.href =
    '../index.php?id=<?php echo $_SESSION['id']; ?>&message=<?php echo $message ?>&status=<?php echo $status; ?>';
</script>";
<?php
    }
}
$conn->close();
?>
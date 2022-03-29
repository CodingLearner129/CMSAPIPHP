<?php
include "./_dbconnect.php";
session_start();

$message = "";
$status = false;

if (isset($_POST["update_empdata"])) {
    $empid = $_POST["empid"];
    $name = $_POST["ename"];
    $email = $_POST["eemail"];
    $pass = $_POST["epass"];
    $phone = $_POST["ephone"];
    $gender = $_POST["egender"];
    $dob = $_POST["edob"];
    $image = $_FILES['efile']['name'];
    $image_loc = $_FILES['efile']['tmp_name'];
    $cid = $_POST["cid"];

    $folder = "../assets/img/";
    $mainFolder = "assets/img/";

    if ($image != "") {
        $mImage = $mainFolder . $image;

        $sql = "UPDATE `employee` SET `employee_name` = '{$name}', `email` = '{$email}', `employee_password` = '{$pass}', `phone` = '{$phone}', `gender` = '{$gender}', `dob` = '{$dob}', `profile`= '{$mImage}' WHERE `id` = '{$empid}'";
    } else {
        $sql = "UPDATE `employee` SET `employee_name` = '{$name}', `email` = '{$email}', `employee_password` = '{$pass}', `phone` = '{$phone}', `gender` = '{$gender}', `dob` = '{$dob}' WHERE `id` = '{$empid}'";
    }

    $resultSql = mysqli_query($conn, $sql);

    if ($resultSql == TRUE) {
        move_uploaded_file($image_loc, $folder . $image);
        $message = "Record Updated Successfully...";
        $status = true;
?>
<script>
window.location.href =
    '../index.php?id=<?php echo $_SESSION['id']; ?>&message=<?php echo $message ?>&status=<?php echo $status; ?>';
</script>";
<?php
    } else {
        $message = "Record Not Updated Successfully!!!";
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
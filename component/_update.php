<?php
include "./_dbconnect.php";
session_start();

$message = "";
$status = false;

if (isset($_POST["updatedata"])) {
    $empid = $_POST["empid"];
    $name = $_POST["empname"];
    $dob = $_POST["empdob"];
    $image = $_FILES['file']['name'];
    $image_loc = $_FILES['file']['tmp_name'];

    $folder = "../assets/img/";
    $mainFolder = "assets/img/";

    if ($image != "") {
        $mImage = $mainFolder . $image;

        $sql = "UPDATE `employee` SET `employee_name` = '{$name}', `dob` = '{$dob}', `profile`= '{$mImage}' WHERE `id` = '{$empid}' ";
    } else {
        $sql = "UPDATE `employee` SET `employee_name` = '{$name}', `dob` = '{$dob}' WHERE `id` = '{$empid}'";
    }

    $resultSql = mysqli_query($conn, $sql);

    if ($resultSql == TRUE) {
        move_uploaded_file($image_loc, $folder . $image);
        $message = "Record Updated Successfully...";
        $status = true;
?>
<script>
window.location.href =
    '../employee.php?id=<?php echo $_SESSION['eid']; ?>&message=<?php echo $message ?>&status=<?php echo $status; ?>';
</script>";
<?php
    } else {
        $message = "Record Not Updated Successfully!!!";
        $status = false;
    ?>
<script>
window.location.href =
    '../employee.php?id=<?php echo $_SESSION['eid']; ?>&message=<?php echo $message ?>&status=<?php echo $status; ?>';
</script>";
<?php
    }
}
$conn->close();
?>
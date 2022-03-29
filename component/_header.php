<?php
include "./component/_dbconnect.php";
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION["id"]) or isset($_SESSION["eid"])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./component/_logout.php">LogOut</a>
                </li>
                <?php
                } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php">LogIn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<?php
if (isset($_GET["message"]) and isset($_GET["status"])) {
    $message = $_GET["message"];
    $status = $_GET["status"];
    // echo $message;
    // echo $status;
    if ($status == true) {
?>
<div class="alert alert1 alert-success" role="alert">
    <strong>Success, </strong><span><?php echo $message; ?></span>
</div>
<?php
    } else {
    ?>
<div class="alert alert1 alert-danger" role="alert">
    <strong>Error, </strong><span><?php echo $message; ?></span>
</div>
<?php
    }
}
?>
<script>
var alert1 = document.querySelector(".alert1");
setTimeout(() => {
    alert1.style.display = "none";
}, 4000);
</script>
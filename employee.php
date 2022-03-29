<!doctype html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Company Page</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include "./component/_header.php";
    
    if (!isset($_SESSION["eid"])) {
        header("location:login.php");
    }
    ?>

    <?php 
        $empid = $_SESSION["eid"];
        $sql = "SELECT * FROM `employee` WHERE `id` = '{$empid}'";

        $resultSql = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($resultSql);

        $name = $row["employee_name"];
        $email = $row["email"];
        $pass = $row["employee_password"];
        $phone = $row["phone"];
        $gender = $row["gender"];
        $dob = $row["dob"];
        $img = $row["profile"];
    ?>

    <div class="container">
    <form id="loadForm" method="POST" action="./component/_update.php" enctype="multipart/form-data" style="background-color: burlywood;">
        <div class="container-fluid p-4 row overflow-auto">
            <h3 class="p-2">Employee Details</h3>
            <div class=" d-flex p-2">
                <label for="file" class="form-label my-1 mx-2">ProfilePic&nbsp;:&nbsp;</label>
                <img class="mx-2" id="edit-img" src="<?php echo $img; ?>" alt="" width="40px" height="30px">
                <input class="form-control" type="file" id="file" name="file" >
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class=" d-flex p-2">
                <input type="hidden" class="form-control" id="empid" name="empid" value="<?php echo $_SESSION["eid"]; ?>">
                <label for="empname" class="form-label my-1 mx-2">Name&nbsp;:&nbsp;</label>
                <input type="text" class="form-control" id="empname" name="empname" value="<?php echo $name;?>" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class=" d-flex p-2">
                <label for="empemail" class="form-label my-1 mx-2">Email&nbsp;:&nbsp;</label>
                <input type="email" class="form-control" id="empemail" name="empemail" value="<?php echo $email;?>" disabled>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class=" d-flex p-2">
                <label for="emppass" class="form-label my-1 mx-2">Password&nbsp;:&nbsp;</label>
                <input type="text" class="form-control" id="emppass" name="emppass" value="<?php echo $pass;?>" disabled>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class=" d-flex p-2">
                <label for="empphone" class="form-label my-1 mx-2">Phone&nbsp;:&nbsp;</label>
                <input type="tel" class="form-control" id="empphone" name="empphone" value="<?php echo $phone;?>" disabled>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class=" d-flex p-2">
                <label for="empgender" class="form-label my-1 mx-2">Gender&nbsp;:&nbsp;</label>
                <input type="text" class="form-control" id="empgender" name="empgender" value="<?php echo $gender;?>" disabled>
            </div>
            <div class=" d-flex p-2">
                <label for="empdob" class="form-label my-1 mx-2">DateOfBirth&nbsp;:&nbsp;</label>
                <input type="date" class="form-control" id="empdob" name="empdob" value="<?php echo $dob;?>" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            
            <div class="col-md-6 p-2 px-3">
                <input type="submit" value="update" name="updatedata" id="save-btn" class="btn btn-success text-center px-4"/>
            </div>
        </div>
    </form>
    </div>

    <div class="b-example-divider"></div>


    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mb-0 border-top bg-dark">
        <div class=" px-4 d-flex align-items-center">
            <a href="/" class="me-2 mb-md-0 text-decoration-none lh-1 text-light">
                CMS
            </a>
            <span class="text-light">© 2022
            </span>
        </div>

        <div class="nav  justify-content-end px-4 list-unstyled d-flex">
            <span class="text-light">By Dhgp</span>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="./assets/js/jQuery.js"></script>
    <script type="text/javascript" src="./assets/js/emplyee_list.js"></script>
</body>

</html>
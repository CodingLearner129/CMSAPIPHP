<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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
    
    if (!isset($_SESSION["id"])) {
        header("location:login.php");
    }
    ?>

    <!-- THis Form Used For Update Purpose-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-form" method="POST" action="./component/_update_empdata.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <!-- <label for="editid" class="col-form-label">Name :</label> -->
                            <input type="hidden" class="form-control" id="edit-id" name="empid">
                            <label for="edit-name" class="col-form-label">Name :</label>
                            <input type="text" class="form-control" id="edit-name" name="ename">
                        </div>
                        <div class="mb-3">
                            <label for="edit-email" class="col-form-label">Email :</label>
                            <input type="email" class="form-control" id="edit-email" name="eemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address.">
                        </div>
                        <div class="mb-3">
                            <label for="edit-pass" class="col-form-label">Password :</label>
                            <input type="password" class="form-control" id="edit-pass" name="epass" minlength="6" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>
                        <div class="mb-3">
                            <label for="edit-phone" class="col-form-label">Phone :</label>
                            <input type="text" class="form-control" id="edit-phone" name="ephone" maxlength="10"
                    pattern="[789][0-9]{9}"
                    title="Must contain at least first number between 7-9 and reamins between 0-9">
                        </div>
                        <div class="mb-3">
                            <label for="edit-gender" class="col-form-label">Gender :</label>
                            <input type="text" class="form-control" id="edit-gender" name="egender">
                        </div>
                        <div class="mb-3">
                            <label for="edit-dob" class="col-form-label">DateOfBirth :</label>
                            <input type="date" class="form-control" id="edit-dob" name="edob">
                        </div>
                        <div class="mb-3">
                            <label for="edit-file" class="col-form-label">ProfilePic:</label>
                            <input type="file" class="form-control" id="edit-file" name="efile">
                            <label for="edit-img" class="col-form-label">Preview:</label>
                            <img id="edit-img" src="" alt="" width="30px" height="30px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <input type="submit" id="update-edit-btn" name="update_empdata" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Show success message -->
    <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert"
        style="display: none !important;">
        <strong>Success, </strong>
        <span id="success-message"></span>
    </div>
    <!-- Show error message -->
    <div class="alert alert-danger alert-dismissible fade show" id="error-alert" role="alert"
        style="display: none !important;">
        <strong>Error, </strong>
        <span id="error-message"></span>
    </div>

    <!-- To Insert New Data -->
    <form id="addForm" method="POST" action="./component/_insert_empdata.php" enctype="multipart/form-data" style="background-color: burlywood;">
        <div class="container-fluid p-4 row overflow-auto">
            <h3 class="p-2">Enter Employee Details</h3>
            <div class="col-md-4 d-flex p-2">
                <input type="hidden" class="form-control" id="cid" name="cid" value="<?php echo $_SESSION["id"]; ?>">
                <label for="empname" class="form-label my-1 mx-2">Name&nbsp;:&nbsp;</label>
                <input type="text" class="form-control" id="empname" name="empname" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-4 d-flex p-2">
                <label for="empemail" class="form-label my-1 mx-2">Email&nbsp;:&nbsp;</label>
                <input type="email" class="form-control" id="empemail" name="empemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address." required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-4 d-flex p-2">
                <label for="emppass" class="form-label my-1 mx-2">Password&nbsp;:&nbsp;</label>
                <input type="password" class="form-control" id="emppass" name="emppass" minlength="6" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-4 d-flex p-2">
                <label for="empphone" class="form-label my-1 mx-2">Phone&nbsp;:&nbsp;</label>
                <input type="tel" class="form-control" id="empphone" name="empphone" maxlength="10"
                    pattern="[789][0-9]{9}"
                    title="Must contain at least first number between 7-9 and reamins between 0-9" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-4 d-flex p-2">
                <label for="empgender" class="form-label my-1 mx-2">Gender&nbsp;:&nbsp;</label>
                <div class="form-check mx-2 mt-1">
                    <input class="form-check-input" type="radio" name="empgender" id="male" value="male" checked>
                    <label class="form-check-label" for="Male">
                        Male
                    </label>
                </div>
                <div class="form-check mx-2 mt-1">
                    <input class="form-check-input" type="radio" name="empgender" id="female" value="female">
                    <label class="form-check-label" for="Female">
                        Female
                    </label>
                </div>
                <div class="form-check mx-2 mt-1">
                    <input class="form-check-input" type="radio" name="empgender" id="other" value="Other">
                    <label class="form-check-label" for="other">
                        Other
                    </label>
                </div>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-4 d-flex p-2">
                <label for="empdob" class="form-label my-1 mx-2">DateOfBirth&nbsp;:&nbsp;</label>
                <input type="date" class="form-control" id="empdob" name="empdob" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-4 d-flex p-2">
                <label for="file" class="form-label my-1 mx-2">ProfilePic&nbsp;:&nbsp;</label>
                <input class="form-control" type="file" id="file" name="file" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-6 p-2 px-3">
                <input type="submit" name="save_empdata" id="save-btn" class="btn btn-success text-center px-4"/>
            </div>
        </div>
    </form>

    <!-- Table That Shoews All Data -->
    <div class="container-fluid my-5 p-5 overflow-auto" style="min-height: 19.6rem; max-height: 50rem;">
        <table class="table table-bordered border-dark">
            <thead class="table-bordered border-dark text-light text-center" style="background-color: crimson;">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pasword</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="load-table" class="table-bordered border-dark text-center">

            </tbody>
        </table>
    </div>

    <div class="b-example-divider"></div>


    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mb-0 border-top bg-dark">
        <div class="col-md-4 px-4 d-flex align-items-center">
            <a href="/" class="me-2 mb-md-0 text-decoration-none lh-1 text-light">
                CMS
            </a>
            <span class="text-light">© 2022
            </span>
        </div>

        <div class="nav col-md-4 justify-content-end px-4 list-unstyled d-flex">
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
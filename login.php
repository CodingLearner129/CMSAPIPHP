<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>LogIn Page</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include "./component/_header.php"; ?>

    <div class="container my-5 p-5">
        <h1 class="mx-5 mb-4">LogIn Page</h1>
        <div class="row mx-5 mt-1 mb-2">
            <div class="col-md-4 py-2">
                <p class="text-secondary fw-bolder">LogIn as :</p>
            </div>
            <div class="col-md-4 py-2 form-check pointer">
                <input class="form-check-input pointer" type="radio" name="login" id="company" checked value="company">
                <label class="form-check-label pointer" for="company">
                    Company
                </label>
            </div>
            <div class="col-md-4 py-2 form-check pointer">
                <input class="form-check-input pointer" type="radio" name="login" id="employee" value="employee">
                <label class="form-check-label pointer" for="employee">
                    Employee
                </label>
            </div>
        </div>
        <div id="companyform" class="formdiv mx-5" style="display: block;">
            <form class="needs-validation" method="POST" action="./component/_company_login.php">
                <div class="mb-3">
                    <label for="cname" class="form-label">Username</label>
                    <input type="text" class="form-control" id="cname" name="cname" minlength="4" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" minlength="6" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <button type="submit" class="btn btn-primary" name="companyLogIn">Submit</button>
                <div class="my-3">
                    <p>Do'nt have an account? <a href="register.php">Register</a> Here</p>
                </div>
            </form>
        </div>
        <div id="employeeform" class="formdiv mx-5" style="display: block;">
            <form method="POST" action="./component/_employee_login.php">
                <div class="mb-3">
                    <label for="ename" class="form-label">Username</label>
                    <input type="text" class="form-control" id="ename" name="ename" minlength="4" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="epassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="epassword" name="epassword" minlength="6" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <button type="submit" class="btn btn-primary" name="employeeLogIn">Submit</button>
            </form>
        </div>
    </div>

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

    <script src="./assets/js/jQuery.js"></script>

    <script>
    $(document).ready(function() {
        $("#employeeform").hide();
        $("input[name$='login']").click(function() {
            var name = $(this).val();
            $(".formdiv").hide();
            $("#" + name + "form").show();
        });
    });
    </script>

</body>

</html>
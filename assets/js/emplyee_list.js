$(document).ready(function () {
    //You can change name based on folder and change port  
    var namePort = 'localhost/CMSAPIPHP';

    //Fetch All Records
    function loadTable() {
        $("#load-table").html("");
        $.ajax({
            url: 'http://' + namePort + '/api/api_fetch_all.php',
            type: "GET",
            dataType : "json",
            success: function (data) {
                // console.log(data);
                if (data.status == false) {
                    $("#load-table").append("<tr><td colspan='10'><h2>" + data.message + "</h2></td></tr>")
                } else {
                    $.each(data, function (key, value) {
                        $("#load-table").append("<tr>"
                            + "<td>" + value.id + "</td>"
                            + "<td>" + value.employee_name + "</td>"
                            + "<td>" + value.email + "</td>"
                            + "<td>" + value.employee_password + "</td>"
                            + "<td>" + value.phone + "</td>"
                            + "<td>" + value.gender + "</td>"
                            + "<td>" + value.dob + "</td>"
                            + "<td> <img src='./" + value.profile + "' width='30px' height='30px'></td>"
                            + "<td><button type='button' class='btn btn-primary edit-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-eid='" + value.id + "'>Edit</button></td>"
                            + "<td><button type='button' class='btn btn-danger delete-btn' data-bs-toggle='modal' data-id='" + value.id + "'>Delete</button></td>"
                            + "</tr>")
                    });
                }
            }
        });
    }

    loadTable();

    //Show message for success or error
    function message(message, status) {
        if (status == true) {
            $("#success-message").html(message);
            $("#success-alert").slideDown();
            $("#error-alert").slideUp();
            setTimeout(() => {
                $("#success-alert").slideUp();
            }, 5000);
        } else if (status == false) {
            $("#error-message").html(message);
            $("#error-alert").slideDown();
            $("#success-alert").slideUp();
            setTimeout(() => {
                $("#error-alert").slideUp();
            }, 5000);
        }

    }

    //Delete Record
    $(document).on("click", ".delete-btn", function () {
        if (confirm("Do you really want to delete this record?")) {
            var empId = $(this).data("id");
            var obj = { empid: empId };
            var myJSON = JSON.stringify(obj);

            var row = this;

            $.ajax({
                url: 'http://' + namePort + '/api/api_delete.php',
                type: "POST",
                dataType : "json",
                data: myJSON,
                success: function (data) {
                    // console.log(data);
                    message(data.message, data.status);

                    if (data.status == true) {
                        $(row).closest("tr").fadeOut();
                    }
                }
            });
        }
    });

    //Fetch Single Record : Show in Model Box
    $(document).on("click", ".edit-btn", function () {
        $(".modal-backdrop").show();
        $("#exampleModal").show();
        var empId = $(this).data("eid");
        var obj = { empid: empId };
        var myJSON = JSON.stringify(obj);

        $.ajax({
            url: 'http://' + namePort + '/api/api_fetch_single.php',
            type: "POST",
            dataType : "json",
            data: myJSON,
            success: function (data) {
                // console.log(data);
                $("#edit-id").val(data[0].id);
                $("#edit-name").val(data[0].employee_name);
                $("#edit-email").val(data[0].email);
                $("#edit-pass").val(data[0].employee_password);
                $("#edit-phone").val(data[0].phone);
                $("#edit-gender").val(data[0].gender);
                $("#edit-dob").val(data[0].dob);
                $("#edit-file").attr("value", data[0].profile);
                $("#edit-img").attr("src", data[0].profile);
            }
        });
    });

});

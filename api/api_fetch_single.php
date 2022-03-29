<?php
    header('Content-Type: application/json');
    
    header('Access-Control-Allow-Origin: *');
    
    header("Access-Control-Allow-Methods: POST");
    
    // header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    
    // header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
    
    include "../component/_dbconnect.php";
    
    $data = json_decode(file_get_contents("php://input"), true);
    
    $emp_id = $data["empid"];
    
    $sql = "SELECT * FROM `employee` WHERE `id` = {$emp_id}";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed!");
 
    if (mysqli_num_rows($result) > 0) {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        echo json_encode(array("message"=>"No Record Found!", "status"=>false));
    }
    
?>
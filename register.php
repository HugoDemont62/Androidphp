<?php
$con = mysqli_connect("Information de la DB");



$useremail = $_POST["useremail"];
$useremail = $con->real_escape_string($useremail);
$password = $_POST["password"];
$password = $con->real_escape_string($password);
$password = sha1($password);




$select = $con->query("SELECT * FROM user WHERE useremail = '".$useremail."' AND  password = '".$password."'");
if(mysqli_num_rows($select)==1) {

    $response = array();
    $response["success"] = true;

}else{
    $response = array();
    $response["success"] = "Retry you don't have an account with this information(s)";
}


echo json_encode($response);
?>
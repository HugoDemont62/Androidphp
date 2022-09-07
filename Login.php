<?php
$con = mysqli_connect("Information de la DB");



$useremail = $_POST["useremail"];
$useremail = $con->real_escape_string($useremail);
$username = $_POST["username"];
$username = $con->real_escape_string($username);
$password = $_POST["password"];
$password = $con->real_escape_string($password);
$password = sha1($password);


//test for pseudo
$select = $con->query("SELECT * FROM user WHERE useremail = '".$useremail."'");
if(mysqli_num_rows($select)) {

    $response = array();
    $response["success"] = "email already used";
}
else{

    $select = $con->query("SELECT * FROM user WHERE username = '".$username."'");
    if(mysqli_num_rows($select)) {

        $response = array();
        $response["success"] = "pseudo already used";
    }
    else{

        $con->query("INSERT INTO user (useremail, username, password)
VALUES ('$useremail', '$username', '$password')");
        $response = array();
        $response["success"] = true;
    }
}




echo json_encode($response);
?>
<?php

header('Content_Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access_Control_Allow_Method: PUT');
header('Access_Control_Allow_Headers: Access_Control_Allow_Headers,Content_Type,Access_Control_Allow_Methods,Authorization,X-Requested-Width');


$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$sname = $data['sname'];
$age = $data['age'];
$city = $data['city'];

include "config.php";

$sql = "UPDATE  student SET student_name = '{$sname}', age = '{$age}', city = '{$city}' WHERE id = {$id}";
if (mysqli_query($conn, $sql)){

    echo json_encode(array('massage' => 'Student Recode Updated.', 'status' => true));
    
}else{
    echo json_encode(array('massage' => 'Student Recode Not Updated.', 'status' => false));

}


?>
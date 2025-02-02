<?php
include '../connect.php';
$user=filterRequest('username');
$email=filterRequest('email');
$phone=filterRequest('phone');
// $password=filterRequest('password');
$stmt=$con->prepare('SELECT *FROM users WHERE user_email =? OR user_phone=?');
$stmt->execute(array($email,$phone));
$count=$stmt->rowCount();
if ($count>0){
echo "the email or phone is exist";
}else{
    $data=array(
    "user_id"=> "1",
        "user_name" =>"$user",
        "user_email" =>"$$email",
        "user_phone" =>"$phone",
        "user_verify_code" =>"0",

    );
    insertData("users",$data);
}



?>
<?php
include "../connect.php";
$username=filterRequst('username');
$email=filterRequst('email');
$password=filterRequst('password');

$stm=$con->prepare("INSERT INTO `user`( `username`, `email`, `password`)
 VALUES (? , ? , ?)");
$stm->execute(array($username,$email,$password));
$count=$stm->rowCount();
if($count>0){

    echo json_encode(array("status"=>"sucess"));
}else{
    echo json_encode(array("status"=>"fail"));

}



?>
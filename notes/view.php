<?php
include "../connect.php";
$user_id=filterRequst('id');
$stm=$con->prepare("SELECT * FROM notes  WHERE user_id = ? ");
$stm->execute(array($user_id));
$data= $stm->fetch(PDO::FETCH_ASSOC);
$count=$stm->rowCount();
if($count>0){
    echo json_encode(array("status"=>"sucess","data"=>$data));
}else{
    echo json_encode(array("status"=>"fail"));
}

?>
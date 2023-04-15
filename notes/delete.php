<?php
include "../connect.php";

$id=filterRequst("id");
$user_id=filterRequst('user_id');
$imagename=filterRequst('imagename');
$stm=$con->prepare(" DELETE FROM `notes`  WHERE id=? AND user_id=? ");
$stm->execute(array($id,$user_id));
$count=$stm->rowCount();

if($count>0){
    deleteFile("../upload",$imagename);
    echo json_encode(array("status"=>"sucess"));
}else{

    echo json_encode(array("status"=>"fail"));
}



?>
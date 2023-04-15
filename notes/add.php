<?php
include "../connect.php";
$title=filterRequst('title');
$content=filterRequst('content');
$iduser=filterRequst('user_id');
$file=uploadFile('file');
if($file!="fail"){
    $stm=$con->prepare(" INSERT INTO `notes` ( `title`, `content`,`image`,`user_id`) VALUES ( ?, ?,?,?) ");
$stm->execute(array($title,$content,$file,$iduser));
$count=$stm->rowCount();
if($count>0){
    echo json_encode(array("status"=>"sucess"));
}else{
    echo json_encode(array("status"=>"fail"));
}
}else{
    echo json_encode(array("status"=>"fail"));
}

?>
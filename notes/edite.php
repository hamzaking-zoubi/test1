<?php
include "../connect.php";
$id=filterRequst('id');
$content=filterRequst('content');
$title=filterRequst('title');
$image=filterRequst('image');
if(isset($_FILES['file'])){
    deleteFile("../upload",$image);
    $image=uploadFile("file");
}


$stm=$con->prepare("UPDATE `notes` SET `title`=?,`content`=?,`image`=? WHERE id=?");
$stm->execute(array($title,$content,$image,$id));
$count=$stm->rowCount();
if($count>0){
    echo json_encode(array("status"=>"sucess"));
}else{
    echo json_encode(array("status"=>"fail"));
}

?>
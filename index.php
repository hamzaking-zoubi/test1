<?php
include "connect.php";
//1
$stm=$con->prepare(" DELETE FROM `user`  WHERE id=?");
$stm->execute(array("hamzafffff",3));

$count=$stm->rowCount();
if($count==1){
  echo "success";
}else{
    echo "fail";
}
?>
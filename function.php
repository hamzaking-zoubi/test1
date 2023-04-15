<?php
define("MB",1048576);
function filterRequst($requstName){

return htmlspecialchars(strip_tags($_POST[$requstName]));

}
function uploadFile($fileRequst){
 
 global $msgError;
 
  $fileName=Rand(1000,100000) .$_FILES[$fileRequst]['name'];
  $fileTmpName=$_FILES[$fileRequst]['tmp_name'];
  $fileSize=$_FILES[$fileRequst]['size'];
  
  $allowEx=array("jpg","png","gif","pdf","mp3");
  $strtoArry=explode(".",$fileName);
  $ext=end($strtoArry);
  $ext=strtolower($ext);
  if(!empty($fileName) && !in_array($ext,$allowEx)){
    $msgError[]='ErrorExt';
  }
  if($fileSize > 2*MB){
    $msgError[]='ErrorSize';
  }
  print_r( $msgError);
  if(empty($msgError)){
   move_uploaded_file($fileTmpName ,"../upload/".$fileName);
   return $fileName;
  }else{
    return "fail";
  }
}

function deleteFile($dir,$fileName){
    if(file_exists($dir."/".$fileName)){
         unlink($dir."/".$fileName);
    }
}
function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }

    // End 
}
?>
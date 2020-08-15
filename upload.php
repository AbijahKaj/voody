<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
/* Getting file name */
$filename = $_FILES['file']['name'];

/* Location */
$date = time();

$uploadOk = 1;
$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
$location = "uploads/".md5($date.$filename).'.'.$imageFileType;
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
    $uploadOk = 0;
}

if($uploadOk == 0){
    echo 0;
}else{
    include_once 'utils.php';
    /* Upload file */
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        $user_id = get_user()['id'];
        $query = "INSERT INTO receipts 
  			  VALUES(NULL, $user_id, '$location', $date)";
        mysqli_query(get_db(), $query);
        $result = array('status' => 1, 'img' => $location);
        header("Content-Type: application/json");
        echo json_encode($result);
    }else{
        $result = array('status' => 0);
        header("Content-Type: application/json");
        echo json_encode($result);
    }
}
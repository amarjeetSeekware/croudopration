<?php 
if(!empty($_GET['id'])){
require_once 'dbcon.php';
    $user_id=$_GET['id'];
    $del_query="DELETE FROM `adddata` WHERE id ='".$user_id."'";
    $result = mysqli_query($con, $del_query);
    if($result){
        header('location:index.php?msg=del');
    }
}
?>
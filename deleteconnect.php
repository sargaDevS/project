<?php
include 'studentdetails.php';
$obj=new studentdetails();

if($_SERVER[REQUEST_METHOD]=='POST'){
    $id= $_POST["id"];
    $result=$obj->delete($id);
    if($result){
        echo " delete successfully";
    }
 }


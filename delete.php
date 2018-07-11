<?php
include 'studentdetails.php';
$obj=new studentdetails();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $id=$_GET["id"];
    $result=$obj->delete($id);
    if($result){
        echo "delete succussfully";
    }
}
?>
<html>
 <head>                                                                                                                                                             </head>
 <body>
 <h2 align= "left" ALIGN="CENTER"><a href="homepage.php"><button>BACK</button>
</body>
 </html>

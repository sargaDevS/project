<?php
include("studentdetails.php");
$objstudent= new studentdetails();
$objstudent->selectStudent();
//$objstudent->insert($name,$email,$phone,$age);
//$objstudent->update();
//$objstudent->delete();
echo "ENTER THE CHOICE  \n 1. INSERT \n 2. UPDATE \n 3. DELETE \n 4. DISPLAY ";
$read= readline();
if($read=="1")
{
    $name=readline("Enter The Name :");
    $email=readline("Enter The Email :");
    $phone=readline("Enter The Phone No :");
    $age=readline("Enter The Age: ");
    $insertinto=$objstudent->insert($name,$email,$phone,$age);
    if($insertinto==true){
        echo " Inserted The Data Successfully";
    }
}
elseif($read=="2")
{
    echo " Enter ID Of Student: ";
    $id= readline();
    $name= readline("Enter Name The To Updated: ");
    $update=$objstudent->update($name,$id);
    if($update==true)
    {
        echo "Data To be Updated";
    }
}
elseif($read=="3")
{
    $id= readline("Enter ID Of Student Those Data To Delete");
    $delete=$objstudent->delete($id);
    if($delete==true){
        echo " Data Deleted Successfully";
    }
}
elseif($read=="4")
{
   $objstudent->selectstudent();
 }
else
{
    echo " No Result";
}
?>

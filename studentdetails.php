<?php
include ('mysqlconnection.php');
class studentdetails
{
   var $id;
   var $name;
   var $email;
   var $phone;
   var $age;

        function __construct(){
           $this->connection = new mysqlconnection();
 }
        function selectStudent($stud_id=0)
        {
            $sqlquery= "select * from studentdetails";
            if($stud_id > 0){
                $sqlquery.=" where id=".$stud_id;
            }
             $dsresult = $this->connection->selectdata($sqlquery); 
             $arr=array();
             if($dsresult->num_rows > 0)
             {
                 while($row=$dsresult->fetch_assoc())
                 {
                   $arr[]=$row;
                 }
             }
             return $arr;
         }
         function insert($name,$email,$phone,$age)
         {
                $sqlquery = "insert into studentdetails(name,email,phone,age) values ('$name','$email','$phone','$age')";
                $dsresult= $this->connection->selectdata($sqlquery);
                if($dsresult==true){
                    return $dsresult;
                }
         }
         function updateStud($name,$email,$phone,$age,$id)
         {
             $sqlquery = "UPDATE studentdetails SET name='$name',email='$email',phone=$phone,age=$age WHERE id=$id";
//             $sqlquery = "update studentdetails set name='$name',email='$email', phone=$phone,age=$age where id=$id";
                 $dsresult = $this->connection->selectdata($sqlquery); 
                 if($dsresult==true){
                     return $dsresult;
                 }
          }
         function delete($id)
             {
                 $sqlquery= "delete from studentdetails where id= '$id'";
                 $dsresult = $this->connection->selectdata($sqlquery); 
                 if($dsresult==true){
                     return $dsresult;
                 }
         }
}
?>

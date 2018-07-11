<html>
<head>
<script>
function validateform(){  
var name=document.myform.name.value;  
var age=document.myform.age.value; 
var phone=document.myform.phone.value;  
var email=document.myform.email.value; 
    var val =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   var num=/^\(?([0-9]{4})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{2})$/;
 
   if(name==""||name == null || isNaN(name) !== true  || /^[A-Za-z ]*$/.test(name) == false) 
    {
        alert("Name must be filled out");
        return false;
    }
    else if(email == null||val.test(email) == false)
    {
        alert("Invalid email");
        return false;
    }
    else if(phone == null||num.test(phone)==false)
    {
    	alert("invalid phone");
	return false;
    }
    else if (age==null|| age.length>2 || age < 1 || isNaN(age) )
    {
	alert("invalid age");
	return false;
    }
}
</script>

<?php
include 'studentdetails.php';
$obj=new studentdetails();
if(isset($_GET['id'])&& $_GET['id']>0){
    $stud_id=(int)$_GET['id'];
    $temp = $obj->selectStudent($stud_id);
    $data = array_shift($temp);
   
}
if (isset($_POST['submit'])){
//if($_POST['submit']){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $age=$_POST["age"];
    $id=$_POST["id"];
    $dsresult = $obj->updateStud($name,$email,$phone,$age,$id);
    if($dsresult){
        echo "updated data successfully";
    }
$data["id"]="";
$data["name"]="";
$data["email"]="";
$data["phone"]="";
$data["age"]="";
}
?>

  <h1 align ="Center">STUDENT DATA UPDATE </h1>
<h2 align= "left" ALIGN="CENTER"><a href="viewstudent_data.php"><button>BACK</button></a></h2>
</head>
<body>
<form name ="myform" method ="post" action ="update.php" onsubmit="return validateform()">
<table>
  <tr>
    <td>
<input type="hidden" name="id" value= <?php echo $data["id"]?> >
</td>
</tr>
  <tr>
    <td>
<label>ENTER THE NAME TO BE UPDATED :</label>
<input type="text"name="name" value= <?php echo $data["name"] ?> >
</td>
</tr>
<tr>
<td>
<label>ENTER THE EMAIL TO BE UPDATED:</label>
<input type="text"name="email" value= <?php echo $data["email"] ?> >
</td>
</tr>
<tr>
<td>
<label>ENTER THE PHONE TO BE UPDATE:</label>
<input type="text" name="phone" value= <?php echo $data["phone"] ?> >
</td>
</tr>
<tr>
<td>
<label>ENTER THE AGE TO BE UPDATE:</label>
<input type="text"name="age"value= <?php echo $data["age"] ?> >
</td>
</tr>
  <tr>
<td>
  <input class="submit" name="submit" type="submit" value="SUBMIT">
</td>
</tr>
</table>
</form>
</body>
</html>

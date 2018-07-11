<?php
include 'studentdetails.php';
$obj= new studentdetails();
?>
<html>
<head>
</head>
<body>
<div class="box" align ="center">
<h2>VIEW STUDENT DATA </h2>
<?php
$dsresult=$obj->selectStudent();
?>
<form method="post">
<table border="1" width="800" border="0">
<tr>
<th scope="col">id</th>
<th scope="col">name</th>
<th scope="col">Email</th>
<th scope="col">Phone</th>
<th scope="col">Age</th>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<?php 
foreach($dsresult as $row)
{
?>
<tr>
<td> <label><?php echo $row['id'];?></label></td>
<td> <label><?php echo $row['name'];?></label></td>
<td> <label><?php echo $row['email'];?></label></td>
<td> <label><?php echo $row['phone'];?></label></td>
<td> <label><?php echo $row['age'];?></label></td>
 <td>
<?php echo "<a href='update.php?id=", $row['id']," '>Edit</a"?></td>
<td>
<?php echo "<a href='delete.php?id=",$row['id'],"'>Delete</a>" ?></td>
</tr>
<?php
}
?>
</table>
</form>
<p>&nbsp;</p>
 <h2 align= "left" ALIGN="CENTER"><a href="homepage.php"><button>BACK</button>
</body>
 </html>
</div>
</body>
<html>

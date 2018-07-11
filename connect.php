<?php
include'studentdetails.php';
$obj= new studentdetails();
if($_SERVER[REQUEST_METHOD]=='POST'){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $age=$_POST["age"];
    $dsresult=$obj->insert($name,$email,$phone,$age);
    if($dsresult){
        echo "data inserted successfully";
    }
}
?>
<html>
<head>
</head>
<body>
<h2 align= "left" ALIGN="CENTER"><a href="homepage.php"><button>BACK</button>
</body>
</html>
<?php
$nameErr = $emailErr = $phoneErr = $ageErr = "";
$name = $email = $phone = $age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["phone"])) {
    $phoneErr = "Number is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("0-9",$phone)) {
      $phoneErr = "Invalid Number";
    }
  }

if (empty($_POST["age"])) {
    $ageErr = "Number is required";
  } else {
    $age = test_input($_POST["phone"]);
    if (!preg_match("0-9",$age)) {
      $ageErr = "Invalid Number";
    }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

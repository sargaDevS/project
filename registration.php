<?php
include'studentdetails.php';
$obj= new studentdetails();
?>
<?php
 $nameErr = $emailErr =  $phoneErr = $ageErr ="";
         $name = $email = $phone =$age ="";
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $namecheck=($_POST["name"]) ;
            if (empty($_POST["name"]) || (!preg_match("/^[a-zA-Z ]*$/",($_POST["name"]))) || $namecheck == null) {
                $nameErr = "Only letters and white space allowed";
                //echo "$namecheck";
            }
            else {
                $name = test_input($_POST["name"]);
            }

             if (empty($_POST["email"]) || ($_POST["email"]) == null || filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)!= true)  {
  	        	$emailErr = "invalid email";
                }
            else {
                $email = test_input($_POST["email"]);
                }

            if (empty($_POST["phone"]) || ($_POST["phone"]) == null || is_numeric($_POST["phone"]) == false  || strlen($_POST["phone"])  < 10) {
  	        	$phoneErr = "invalid phone";
                }
            else {
                $phone = test_input($_POST["phone"]);
                }
            if (empty($_POST["age"]) || ($_POST["age"]) == null || is_numeric($_POST["age"]) == false || filter_var($_POST["age"], FILTER_VALIDATE_INT) !=true || filter_var($_POST["age"], FILTER_VALIDATE_INT) === 0 || strlen($_POST["age"])  > 2) {
  	        	$ageErr = "invalid Age";
                }
            else {
                $age = test_input($_POST["age"]);
                }
            }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

   if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($ageErr)){
 //if(empty($nameErr)&&empty($emailErr)&&empty($phoneErr)&&($ageErr)){
    $dsresult=$obj->insert($name,$email,$phone,$age);
    if($dsresult){
        echo "Data Inserted Successfully";
    }
}
?>
<html>
<head>
</head>
<body>
  <h1 align ="Center">STUDENT REGISTER FORM </h1>
</div>
<h2 align= "left" ALIGN="CENTER"><a href="homepage.php"><button>BACK</button></a></h2>
<form method = "post" action = "<?php
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
</form>

<table>
        <tr>
            <td>
            Name: <input type="text" pattern="[A-Za-z\s]+" name="name" value="" >
            <span class="error">* <?php echo $nameErr;?></span></td></tr>
        <tr>
             <td>
             E-mail: <input type="text"$pattern = "[[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})]+"; name="email" value="" >
             <span class="error">* <?php echo $emailErr;?></span></h3></td></tr>
        <tr>
              <td>
               Phone: <input type="text" pattern="[0-9]+" name="phone" value="">
               <span class="error">* <?php echo $phoneErr;?></span></h3></td></tr>
        <tr>
             <td>
             Age : <input type="text" pattern="[0-9]+" name="age" value="">
             <span class="error">* <?php echo $ageErr; ?> </span></h3></td></tr>
        <tr>
            <td>
            <input class="submit" name="submit" type="submit" value="SUBMIT">
            </td>
       </tr>
</fieldset>
</table>
</body>
</html>

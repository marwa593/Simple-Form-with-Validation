<?php
require('user-validator.php');

if(isset($_POST['Submit']))
{
    //validate entries
  $validation =new uservalidator($_POST);
  $errors=$validation->validateform();

}
?>



<html lang="en">
<head>
<title> PHP OOP TUTORIAL</title>
<link rel="stylesheet"  type="text/css" href="style.css">
</head>

<body>
<div class="new-user">
<h2> Create New User </h2>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >

<label>FirstName:</label>
<input type="text" name="firstname"  />
<div class="error">
    <?php echo $errors['firstname'] ?? '' ?>
</div>

<label>LastName:</label>
<input type="text" name="lastname"  />
<div class="error">
    <?php echo $errors['lastname'] ?? '' ?>
</div>

<label>UserName:</label>
<input type="text" name="username"  />
<div class="error"> 
   <?php echo $errors['username'] ?? ''  ?> 
</div>


<label>Email:</label>
<input type="text" name="email"  />
<div class="error">
    <?php echo $errors['email'] ?? '' ?>
</div>





<input type="submit" value="submit" name="Submit">


</form>
</div>


</body>



</html>
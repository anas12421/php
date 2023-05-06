<?php
session_start();

$name = $_POST ['name'];
$email = $_POST ['email'];
$password = $_POST ['password'];


$uppercase = preg_match('@[A-Z]@' , $password);
$lowercase = preg_match('@[a-z]@' , $password);
$number = preg_match('@[0-9]@' , $password);
$sp_ch = preg_match('/[!,@,#,$,%,^,&,*,(,),_,-,+,=,.,,,<,>,?,\,{,},`,~,|,]/' , $password);

$register_form = false;


if(!$name){
$register_form = true;
$_SESSION["name_error_message"] = "Please Enter Your Name";
}
else{
  $_SESSION["old_name"] = $name ;
}

if(!$email){
$register_form = true;
$_SESSION["email_error_message"] = "Please Enter a Valid Email";
}
else{
  
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $register_form= true;
    $_SESSION["old_email"] = $email;
    $_SESSION["email_error_message"] = "Valid email format 'name@example.com'";
}else{
  $_SESSION["old_email"] = $email;
}
}
if(!$password){
$register_form = true;
$_SESSION["password_error_message"] = "Please Enter a Strong Password";
}
else{
  if(!$uppercase){
$register_form = true;
$_SESSION["password_error_message"]= "Please input min 1 'UPPERCASE' charecter";
$_SESSION["old_password"] = $password ;
  }
  if(!$lowercase){
$register_form = true;
$_SESSION["password_error_message"]= "Please input min 1 'lowercase' charecter";
$_SESSION["old_password"] = $password ;
  }
  if(!$number){
$register_form = true;
$_SESSION["password_error_message"]= "Please input min 1 'number' 0-9";
$_SESSION["old_password"] = $password ;
  }
  if(!$sp_ch){
$register_form = true;
$_SESSION["password_error_message"]= "Please input min 1 'Special Charecter'";
$_SESSION["old_password"] = $password ;
  }
  if(strlen($password) < 8){
$register_form = true;
$_SESSION["password_error_message"]= "Min 8 character needed";
$_SESSION["old_password"] = $password ;
  }
  else{
    $_SESSION["old_password"] = $password ;
  }
}

if($register_form){
  header("location:register.php");
}
else{
  echo "Your Name Is:-"."&nbsp;&nbsp;&nbsp;&nbsp;".$name."<br>";
  echo "Your Email Is:-"."&nbsp;&nbsp;&nbsp;&nbsp;".$email."<br>";
  echo "Your Password Is:-"."&nbsp;&nbsp;&nbsp;&nbsp;".$password."<br>";
}


?>




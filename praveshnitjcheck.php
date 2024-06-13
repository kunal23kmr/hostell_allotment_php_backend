<?php
session_start();
include 'cors.php';

require_once("db.php");

if(isset($_POST["login"]))

{
    $email=mysqli_real_escape_string($con,$_POST["username"]);
    $password=mysqli_real_escape_string($con,$_POST["password"]);
    $captcha=mysqli_real_escape_string($con,$_POST["captcha"]);
    $shapass=hash("sha512",$password);
    $sql="select username, password from pravesh where username='".$email."'";
    $_SESSION['email']=$email;
    $result=mysqli_query($con,$sql);
    $dbpassword=mysqli_fetch_array($result);
    echo $dbpassword["password"];
    
    $_SESSION['user']=$email;
    
    if($_SESSION["CAPTCHA_CODEPRA"]==$captcha)
    {
    
    if($dbpassword["password"]==$shapass && $dbpassword["username"]==$email)
    {
     $_SESSION["doccheck"]=true;
    header('Location: doccheck.php');
    }
    else
    {
        echo '<script type=\'text/javascript\'> alert("Wrong Username and Password"); location="praveshnitj.php";</script>';
    }
    
    }
    else
    {
        echo '<script type=\'text/javascript\'> alert("Wrong Captcha Entered! Please Try Again"); location="praveshnitj.php";</script>';
    } 
    
    
}

?>
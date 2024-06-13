<?php

require_once("db.php");
// Include the CORS handling file
include 'cors.php';


session_start();
if(isset($_POST["login"]))
{
$appid=mysqli_real_escape_string($con,$_POST["appid"]);
$password=mysqli_real_escape_string($con,$_POST["password"]);

$_SESSION['appid']=$appid;


$password_sql="select application_id, password, gender , hosteler, mobile_flag from signup where application_id='$appid'";

$result_password=mysqli_query($con,$password_sql);
$dbpassword=mysqli_fetch_array($result_password);

$_SESSION['gender']=$dbpassword['gender'];
$gender=$_SESSION['gender'];

$form_sql="select filled from student_data where application_id='$appid'";
$result_form=mysqli_query($con,$form_sql);
$filled=mysqli_fetch_array($result_form);

$upload_query="select uploaded from docs where application_id='$appid'";
$result_upload=mysqli_query($con,$upload_query);
$uploaded=mysqli_fetch_array($result_upload);

$alloted_sql="select alloted from booking where application_id='$appid'";
$result_alloted=mysqli_query($con,$alloted_sql);
$alloted=mysqli_fetch_array($result_alloted);

$hostel_query="select hostel_no from student_data where application_id='$appid'";
$result_hostel=mysqli_query($con,$hostel_query);
$hostel=mysqli_fetch_array($result_hostel);


if($dbpassword['password']==$password && $dbpassword['application_id']==$appid && $dbpassword['mobile_flag']==1)
{
    if($dbpassword['hosteler']==1)
    {
        if($uploaded['uploaded']!=1)
    {
        $_SESSION["authenticated"]=true;
        header('Location:doc.php');
        exit;
    }
    
    if($uploaded['uploaded']==1 && $filled['filled']!=1)
    {   if($gender=="Male")
    {
          $_SESSION["authenticated"]=true;
            header('Location:form.php');
            exit;
    }
    elseif($gender=="Female")
    {
         $_SESSION["authenticated"]=true;
            header('Location:Form.php');
            exit;
    }
    
    }
    if($uploaded['uploaded']==1 && $filled['filled']==1 && $alloted['alloted']!=1)
    {
       if($hostel['hostel_no']=="1")
       {
            $_SESSION["authenticated"]=true;
            header('Location:bh1.php');
            exit;
       }
       
       if($hostel['hostel_no']=="2")
       {
            $_SESSION["authenticated"]=true;
            header('Location:bh2.php');
            exit;
       }
       
       if($hostel['hostel_no']=="5")
       {
            $_SESSION["authenticated"]=true;
            header('Location:bh5.php');
            exit;
       }
       
       if($hostel['hostel_no']=="GH2")
       {
            $_SESSION["authenticated"]=true;
            header('Location:gh2.php');
            exit;
       }
    }
    
    if($uploaded['uploaded']==1 && $filled['filled']==1 && $alloted['alloted']==1 )
    {
         $_SESSION["authenticated"]=true;
            header('Location:alloted.php');
            exit;
    }
    }
    
    else
    {
        if($filled['filled']!=1)
        {
            $_SESSION["authenticated"]=true;
            header('Location:form_day.php');
            exit;
        }
        else
        {
            $_SESSION["authenticated"]=true;
            header('Location:alloted_day.php');
            exit;
        }
    }
}

else
{
     echo '<script type=\'text/javascript\'> alert("Wrong Application ID or Password"); location="signin.php";</script>';
}

}




?>

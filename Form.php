<?php
require_once("db.php");
include 'cors.php';

session_start();
if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    // If the user is not authenticated, redirect them to the login page
    header('Location: signin.php');
    exit();
}
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");



$appid=$_SESSION['appid'];


$gh2_sql="select sum(filled_seats) from gh2details";
$result_gh2=mysqli_query($con,$gh2_sql);
$gh2_data=mysqli_fetch_array($result_gh2);



?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="1000">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hostel Allotment Portal | NITJ</title>
<meta name="keywords" content="NITJ Hostel Allotment" />
<meta name="description" content="Joint Conference" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/rase.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/dropdown.css" rel="stylesheet" type="text/css" media="all" />
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" /> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
 <!--   <link href="font-awesome.css" rel="stylesheet" type="text/css" media="all" />-->
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->


<style>
        .login-container {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>

 <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>

<body>

    
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 login-container">
                <h1 class="text-center mb-4">Registration Form</h1>
                <form action="Formupload.php" method="POST">
                    <div class="form-group">
                        <label><b>Full Name: </b></label>
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label><b>Registration No:</b></label>
                        <input type="text" id="rno" name="rno" class="form-control" readonly="readonly" value="<?php echo $appid; ?>" placeholder="<?php echo $appid; ?>">
                    </div>
                    <div class="form-group">
                        <label><b>Father's Name:</b></label>
                        <input type="text" id="father" name="father" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><b>Mother's Name:</b></label>
                        <input type="text" id="mother" name="mother" class="form-control" required>
                    </div>
                    <!-- Add other fields here in the same pattern -->
                    <!-- Branch -->
                    <div class="form-group">
                        <label><b>Branch:</b></label>
                        <select name="branch" id="branch" class="form-control" required>
                        <option value="">Select</option>
                            <option value="biotechnology">Biotechnology</option>
  
  <option value="Chemical Engineering">Chemical Engineering</option>
  <option value="Civil Engineering">Civil Engineering</option>
  <option value="Computer Science and Engineering">Computer Science and Engineering</option>
    <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
      <option value="Electrical Engineering">Electrical Engineering</option>
        <option value="Humanities and Management">Humanities and Management</option>
          <option value="Industrial and Production Engineering">Industrial and Production Engineering</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Instrumentation and Control Engineering">Instrumentation and Control Engineering</option>
            
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            
            <option value="Textile Technology">Textile Technology</option>
            <option value="Data Science and Engineering">Data Science and Engineering</option>
            <option value="Electronics and VLSI Engineering">Electronics and VLSI Engineering</option>
                        </select>
                    </div>
                    <!-- Self Mobile No -->
                    <div class="form-group">
                        <label><b>Self Mobile No:</b></label>
                        <input type="tel" id="mnumber" name="mnumber" pattern="[0-9]{10}" class="form-control" required>
                    </div>
                    <!-- Father's Mobile No -->
                    <div class="form-group">
                        <label><b>Father's Mobile No</b>:</label>
                        <input type="tel" id="fmnumber" name="fmnumber" pattern="[0-9]{10}" class="form-control" required>
                    </div>
            <div class="form-group">
          <label><b>Mother's Mobile No:</b></label><input type="tel" id="mmnumber" name="mmnumber" pattern=[0-9]{10} class="form-control" required>
          </div>
          <div class="form-group">
          <label><b>Sibling's Mobile No:</b></label><input type="tel" id="smobile" name="smobile" pattern=[0-9]{10} class="form-control" required>
          </div>
          <div class="form-group">
        <label><b>Postal Address with Pincode:</b></label><input type="text" id="address" name="address" class="form-control" required> 
        </div>
        <div class="form-group">
        <label><b>State:</b></label><select name="state" id="state" class="form-control" required>
        <option value="">Select</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select></div>
<div class="form-group">
<label><b>Physically Handicapped</b></label> <select name="ph" id="ph" class="form-control" required>
<option value="No">No</option> 
<option value="Yes">Yes</option>
</select></div>
<div class="form-group">
        <label><b>Local Guardian Postal Address with Pincode:</b></label><input type="text" id="laddress" name="laddress" class="form-control" required>
        </div>
        <div class="form-group">
            <label><b>Email Address </b></label>
            <input type="email" id="email" name="email" class="form-control" required >
        </div>
<div class="form-group">
    <label>
        <b>Gender: </b>
    </label>
    <select name="gender" id="gender" class="form-control" required>
        <option value="Female">Female</option>
       
    </select>
</div>
<div class="form-group">
    <label>
        <b> Blood Group</b>
    </label>
    <select class="form-control" name="blood_group" required>
						<option value="">Select Blood Group</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
    
</div>
<div class="form-group">
    <label>
        <b> Hostel No:</b>
    </label>
    <select name="hostel_no" id="hostel_no"  class="form-control"  required>
        <option value="">Select</option>
        <option value="GH1">Girls Hostel 1</option>
     
    </select>
    
</div>
                    <!-- Add other fields here -->
                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Save & Proceed">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
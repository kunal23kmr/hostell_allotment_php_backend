
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
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-top: 100px;
        }
    </style>
</head>


<body><br>
<br>
<br><br><br><br>
    <center>
        <h1>Hostel Allocation</h1>
        
      
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 login-container">
                <h2 class="mb-3">Sign In </h2>
               <form action="signinp.php" method="POST">
                    <div class="form-group">
                        <label for="applicationId">Application ID</label>
                        <input type="text" class="form-control" id="appid" name="appid"   placeholder="Enter JEE(Main) Application ID" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="login" id="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
    
    
</body>
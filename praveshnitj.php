<html>
    <head>
        
        <title>
            Pravesh
        </title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
    </head>
    <body>
        <center>
            <form action="praveshnitjcheck.php" method="post">
            <div class="mb-3" style="width:500px; margin-top:100px;">
                <label for="email" class="form-label">Username</label>
                <input type="email" class="form-control" name="username" required>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required><br>
                <label>Captcha Code</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="captchapra.php" alt="PHP Captcha"><br><br>
<br><br<br>
<label>Enter Captcha</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="text" class="form-control"  name="captcha" id="captcha" required><br><br>
                <input type="submit" name="login" class="btn btn-outline-primary" value="Submit">
                
            </form>
            
        </center>
        </div>
    </body>
</html>
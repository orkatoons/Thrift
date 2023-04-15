<?php
//send to ayush
session_start();
if(isset($_POST['submit'])){
    $con = mysqli_connect("localhost","root","","thrift_hub");
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone = $_POST['phone'];
    $usertype = $_POST['userType'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $email_regex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  if (!preg_match($email_regex, $email)) {
    echo "<div id='e-msg' class='alert alert-danger'>Invalid email format</div>";
    ?>
    <script>
       setTimeout(function() {
      document.getElementById("success-msg").style.display = "none";
      }, 3000);
     </script>
    <?php

    exit;
}
else{
    
    
    $sql2 = "SELECT * FROM users WHERE username = '{$username}'";
    
    $res2=mysqli_query($con,$sql2);

    if(mysqli_num_rows($res2)>0){
        echo "<div id='usernameAlready' class='alert alert-danger'>username already exists</div>";
        ?>
        <script>
            setTimeout(function() {
                document.getElementById("usernameAlready").style.display = "none";
            }, 3000); 
         </script> 
        <?php
    }else{
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0) {
            echo "<div id='already' class='alert alert-danger'>Email already exists</div>";
            ?>
            <script>
               setTimeout(function() {
              document.getElementById("already").style.display = "none";
              }, 3000); 
             </script> 
            <?php
    
        }
        else{
    
            if($password===$cpassword){
    
                $pass = password_hash($password,PASSWORD_BCRYPT); // encrypting the password
    
                $sql="INSERT INTO `users`(`username`, `user_type`, `email`, `phone_number`, `password`, `fname`, `lname`, `user_time`) VALUES ('$username','$usertype','$email','$phone','$pass','$first_name','$last_name',NOW())";
    
               if(mysqli_query($con,$sql)){
            
                echo "<div id='success-msg' class='alert alert-success'>Hello $username You have registered successfully</div>";
                ?>
                <script>
                   setTimeout(function() {
                  document.getElementById("success-msg").style.display = "none";
                  }, 3000); 
                 </script>
                <?php
               }
               else{
                echo "<div id='error-msg' class='alert alert-danger'>Error</div>";
                ?>
                <script>
                   setTimeout(function() {
                  document.getElementById("error-msg").style.display = "none";
                  }, 3000); 
                 </script>
                <?php
               }
    
            }
            else{
                echo "<div id='er-msg'class='alert alert-danger'>Password are not matching</div>";
                ?>
                <script>
                   setTimeout(function() {
                  document.getElementById("er-msg").style.display = "none";
                  }, 3000); 
                 </script>
                <?php
    
            }
    
        }
    }

    
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="img\nav.css">
    <link rel="stylesheet" type="text/css" href="img\style.css">
    <?php
    include 'css.php';

    ?>
</head>
<!-- The col-md-4 class specifies that the column should take up 4 columns of space out of a total of 12 columns on medium-sized devices and up. The offset-md-4 class adds a left margin to the column that is equivalent to 4 columns of space, effectively centering the column horizontally within its parent container. -->

<body>
<nav>
        <div id="logo">
          <a href="homepage.html">
              <img src="img\logo.png" alt="Thrift Shopping logo" width="20%" height="20%">
          </a>
          <span id="tagline">Steals and Deals</span>
        </div>
  
        <form class="search-form">
          <input type="text" placeholder="Search...">
          <datalist id="items">
              <option value="Shirts"></option>
              <option value="Pants"></option>
              <option value="Skirts"></option>
              <option value="JumpSuits"></option>
              <option value="Kurtis"></option>
              <option value="Shorts"></option>
              <option value="T Shirts"></option>
              <option value="Blazers"></option>
            </datalist>
          <button type="submit" ><img src="img\search-icon.png" alt="Search Icon" id="nav-search-button-img"></button>
        </form>
        <div class="dropdown">
              <button class="dropbtn">More
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
              </div>
            </div>
        <div id="login-signup">
              <a  href="login.html">
                  <button class="login-button">Login / Signup</button>
              </a>
          </div>
    </nav>

  
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <center><h3 class="text-center">Register on Thrift Hub</h3></center>
                    <div class="form-group my-2">
                        <label for="firstName">First name:</label>
		                <input type="text" id="firstName" name="firstName"  placeholder="First Name" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="lastName">Last Name:</label>
		                <input type="text" id="lastName" name="lastName"  placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group my-2">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" >
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Phone Number:</label>
		                <input type="tel" id="phone" name="phone"  placeholder="Phone number" required>
                    </div>
                    <div class="form-group my-2">
                    <label for="userType">User Type:&nbsp;</label>
                    <select id="userType" name="userType"  required>
                        <option value="">Select User Type</option>
                        <option value="seller">Seller</option>
                        <option value="buyer">Buyer</option>
                        <option value="reseller">Reseller</option>
                    </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="password" >
                    </div>
                    <div class="form-group my-2">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword"placeholder="Confirm password" >
                    </div>
                    <div class="form-group my-4">
                        <input type="submit" name="submit"class="form-control btn btn-success" value="Register">
                    </div>
                    <div class="form-group ">
                       Already have an account? <span><a href="login.php">Login</a></span>
                    </div>                
                </form>
            </div>
        </div>
    </div>
</body>

</html>


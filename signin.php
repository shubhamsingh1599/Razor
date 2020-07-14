<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="Vendors/CSS/normalize.css">
        <link rel="stylesheet" type="text/css" href="Vendors/CSS/grid.css" >
        <link rel="stylesheet" type="text/css" href="Vendors/CSS/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="Resources/CSS/style.css">
        <link rel="stylesheet" type="text/css" href="Resources/CSS/queries.css">
        <script type="text/javascript" src="Resources/JS/jquery-3.3.1.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet" type="text/css" >        
        <title>Log in</title>
        <link rel = "icon" href =  "Resources/images/logo2.png" type = "image/x-icon">
        <meta charset="UTF-8">
        
        <script>
            var link = document.getElementById("su-btn");
            var form = document.getElementById("form1");
            var btn_sub = document.getElementById("btn-sub");
            
            link.addEventListener("click", function() {
                form.submit();
            }
            });
            
            function hover() {
                btn_sub.style.color = '#fff';
                btn_sub.style.backgroundcolor = '#3BF8FF';
            }
            
            function normal() {
                btn_sub.style.color = '#1a1a1a';
                btn_sub.style.backgroundcolor = 'transparent';
            }
            
        </script>
        
        <?php  
            require('connection.php');

            if (isset($_POST['name']) and isset($_POST['password'])){

            // Assigning POST values to variables.
            $username = $_POST['name'];
            $password = $_POST['password'];

            // CHECK FOR THE RECORD FROM TABLE
            $query = "SELECT * FROM `user_info` WHERE username='$username' and password='$password'";

            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $count = mysqli_num_rows($result);

            if ($count == 1){

            //echo "Login Credentials verified";
            echo "<script type='text/javascript'>alert('Login Successful');location.href='homepage.html';</script>";

            }else{
            echo "<script type='text/javascript'>alert('Invalid Login Credentials');location.href='#';</script>";
            //echo "Invalid Login Credentials";
            }
            }
        ?>
        
    </head>
    <body>
        <div class="row">
            <a href="homepage.html" class="menu" style="border: 0px;"><i class="icon ion-md-menu"></i></a>
        </div>
        <a href="index.html">
            <div class="row">
            <img src="Resources/images/logo1.png" alt="Logo" class="logo">
            </div>
        </a>
        <header class="signin">
            <div class="login-all">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="form1" id="form1">
                    <div class="row login-head"><h2>Log In</h2></div>
                    <div class="row">
                        <div class="col span-1-of-2">
                            <lable for="name" class="title">Username</lable>
                        </div>
                        <div class="col span-1-of-2">
                            <input type="text" placeholder="" id="name" name="name" class="space" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-2">
                            <lable for="password" class="title">Password</lable>
                        </div>
                        <div class="col span-1-of-2">
                            <input type="password" id="password" name="password" placeholder="" class="space" required>
                        </div>
                    </div>
                    <div class="row button">
                        <div class="col span-1-of-2">
                            <a class="btn btn-ghost login" href="signup.php">Sign Up</a>
                        </div>
                        <div class="col span-1-of-2">
                            
                            <a class="btn btn-ghost google-btn" href="#" onclick="document.getElementById('form1').submit();">Log In</a>
                            <!--
                            <input type="submit" onmouseover="hover" onmouseout="normal" class="btn1 btn-ghost1 google-btn" value="Log In" id="btn-sub">
                            -->
                        </div>
                    </div>
                </form>
            </div>
        </header>
        
        <footer>
            <div class="row">
                <div class="col span-1-of-2">
                    <ul class="footer-nav">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="nf.html">iOS App</a></li>
                        <li><a href="nf.html">Android App</a></li>
                    </ul>
                </div>
                <div class="col span-1-of-2">
                    <ul class="social-links">
                        <li><a href="nf.html"><i class="ion-logo-facebook"></i></a></li>
                        <li><a href="nf.html"><i class="ion-logo-twitter"></i></a></li>
                        <li><a href="nf.html"><i class="ion-logo-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="row">
                <p>
                    Copyrighht &copy; 2019 by Razor. All rigths reserved.
                 </p>
            </div>
        </footer>
        
        </body>
</html>
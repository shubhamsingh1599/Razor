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
        <title>Sign Up</title>
        <link rel = "icon" href =  "Resources/images/logo2.png" type = "image/x-icon">
        <meta charset="UTF-8">
        <script type="text/javascript">
            var link = document.getElementById("su-btn");
            var form = document.getElementById("form1");
            link.addEventListener("click", function() {
                form.submit();
            });
        </script>
        
        <?php  
            require('connection.php');

            if (isset($_POST['name']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['username']) and isset($_POST['re'])) {

            // Assigning POST values to variables.
            $username = $_POST['username'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordErr = "";
                
            $pass_len = preg_match('/^\S*(?=\S{7,})\S*$/',$password);
            $pass_low = preg_match('/^\S*(?=\S*[a-z])\S*$/',$password);
            $pass_up = preg_match('/^\S*(?=\S*[A-Z])\S*$/',$password);
            $pass_num = preg_match('/^\S*(?=\S*[\d])\S*$/',$password);
            $pass_ch = preg_match('/^\S*(?=\S*[\W])\S*$/',$password);
                
            if($_POST["password"] == $_POST["re"]) {
                if (!$pass_len) {
                    $passwordErr = "Your Password Must Contain At Least 7 Characters!";
                }
                elseif(!$pass_num) {
                    $passwordErr = "Your Password Must Contain At Least 1 Number!";
                }
                elseif(!$pass_up) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                }
                elseif(!$pass_low) {
                    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
                elseif(!$pass_ch) {
                    $passwordErr = "Your Password Must Contain At Least 1 Special Character!";
                }
            }
            else {
                $passwordErr = "Please Check You've Entered Or Confirmed Your Password!";
            }

            // INSERT RECORD INTO TABLE
            if($passwordErr == "") {
                //echo "<script type='text/javascript'>alert('In If');location.href='#';</script>";
                $query = "INSERT INTO `user_info` (`username`, `name`, `email`, `password`) VALUES ('$username','$name','$email','$password')";

                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                $query = "SELECT * FROM `user_info` WHERE username='$username' and password='$password'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                $count = mysqli_num_rows($result);

                if ($count == 1){

                //echo "Signup Credentials verified";
                echo "<script type='text/javascript'>alert('Signup Successful');location.href='homepage.html';</script>";

                }
            }
            else {
                //echo "<script type='text/javascript'>alert('In Else');location.href='#';</script>";
                echo "<script type='text/javascript'>alert('$passwordErr');location.href='#';</script>";
                //echo "Invalid Signup Credentials";
            }
            }
            
            
        ?>
        
    </head>
    
    <body>
        <a href="index.html">
            <div class="row">
            <img src="Resources/images/logo1.png" alt="Logo" class="logo">
            </div>
        </a>
        <section class="signup">
            <form action="<?=$_SERVER['PHP_SELF']?>" name="form1" id="form1" onsubmit="return validate();" method="post">
                <div class="row qrow"><h2>SIGN UP</h2></div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <lable for="name" class="title">Name</lable>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="text" placeholder="" class="space" name="name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <lable for="name" class="title">Username</lable>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="text" placeholder="" class="space" id="username" name="username" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <lable for="email" class="title">Email</lable>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="email" placeholder="" class="space" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <lable for="password" class="title">Password</lable>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="password" placeholder="" class="space" id="password" name="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <lable for="password" class="title">Re-Enter Password</lable>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="password" placeholder="" class="space" id="re" name="re" required>
                    </div>
                </div>
            
                <div class="row button">
                    <div class="col span-1-of-2">
                        <a class="btn btn-ghost login" href="signin.php">Log In</a>
                    </div>
                    <div class="col span-1-of-2">
                        
                        <a class="btn btn-ghost google-btn" href="#" id="su-btn" onclick="document.getElementById('form1').submit();">Submit</a>
                        
                        <!--
                        <input type="submit" class="btn1 btn-ghost1 google-btn" value="Sign Up" id="btn-sub">
                        -->
                    </div>
                </div>
            </form>
        </section>
        
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
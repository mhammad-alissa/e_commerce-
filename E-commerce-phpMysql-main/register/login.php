<?php
     $conn = mysqli_connect('localhost','root','','ecommerce');

     if(isset($_POST['submit'])){
        // $check = true;

        $email          = $_POST['email'];
        $pass           = $_POST['pass'];

        // if empty
        if(empty($pass)){
            $pass_error = 'please enter your password';
            // $check = false;
        }
        if(empty($email)){
            $email_error = 'please enter your Email ';
            //    $check = false;
            }

        
        if(!empty($email) && !empty($pass)){
            //  if admin
            $sql_admin="SELECT * FROM admins WHERE admin_email='".$email."' AND admin_password='".$pass."' limit 1 ";

            $result_admin = mysqli_query($conn,$sql_admin);

             if(mysqli_num_rows($result_admin) == 1){
                session_start();
                 if(!isset($_SESSION['admin'])){
                    $row1 = $result_admin->fetch_assoc();
                    $_SESSION['admin'] = $row1['admin_id'];
                 }

                  header("Location:../group-project4/includes/admin_dashboard.php");
                
            }else {
                //  if user
                $sql_user="SELECT * FROM users WHERE user_email='".$email."' AND user_password='".$pass."' limit 1 ";
    
                $result_user = mysqli_query($conn,$sql_user);
                
                    if(mysqli_num_rows($result_user) == 1){
                        // session_start()
                        session_start();
                         if(!isset($_SESSION['user'])){
                           $row2 = $result_user->fetch_assoc();
                           $_SESSION['user'] = $row2['user_id'];
                         }
                            echo $_SESSION['user'];
                         header("Location:../index.php");

                    }else $email_error = "The email you entered isn’t connected to an account";
            }
        }
    }
      
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/signUp-style.css" rel="stylesheet" type="text/css" media="all" />

<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">

				<form action="" method="post">
                     

                       <div><label for="email" class="form-label head-photo">Email</label>
					<input class="text email inp-marg" type="email" name="email" placeholder="Email" id="email">
                        <small id="emailMessageError" class="form-text"><?php echo (isset($email_error))? $email_error:"";
                            ?></small></div> 

                       <div> <label for="pass" class="form-label head-photo">Password</label>
					<input class="text inp-marg" type="password" name="pass" placeholder="Password" id="pass">
                        <small id="passMessageError"  class="form-text"><?php echo (isset($pass_error))? $pass_error:"";
                            ?></small></div>

					<input type="submit" value="LOGIN" name="submit" id="submit">
				</form>
				<p>Don't have an Account? <a href="signUp.php"> Sign Up!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2022 Login Form. All rights reserved </p>
		</div>
		<!-- //copyright -->
	</div>
	<!-- //main -->

     <script src="js/signUp.js"></script> 
</body>
</html>
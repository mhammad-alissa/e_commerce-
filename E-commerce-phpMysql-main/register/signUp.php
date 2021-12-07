<?php
    
    $conn=mysqli_connect('localhost','root','','ecommerce');


    // $fullName_error = '';
    if(isset($_POST['submit'])){
        $signup_date = date("Y/m/d") ;
        $check = true;
        $fullName       = $_POST['fullName'];  
        $email          = $_POST['email'];
        $pass           = $_POST['pass'];
        $ConfirmPass    = $_POST['ConfirmPass'];
      
        if(empty($fullName)){
          $fullName_error = 'please enter User Name';
          $check = false;
        }
        if(empty($email)){
          $email_error = 'please enter your email ';
          $check = false;
        }else if(!(preg_match("/^[A-z0-9._-]+@(hotmail|gmail|yahoo).com$/", $email))) {
          $email_error = 'Email is not valid';
          $check = false;
        }else{
            $sql="SELECT * FROM users WHERE user_email='".$email."' limit 1 ";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) == 1){
                $email_error = "The email you entered already exists";
                $check = false;
            }
        }
        if($_FILES['fileToUpload']['size'] === 0){
            $img_error = 'please select image';
            $check = false;
        }
        if(empty($pass)){
          $pass_error = 'please enter your password';
          $check = false;
        }else if(!preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#',$pass)) {
          $pass_error = 'password is not valid';
          $check = false;
        }
        if(empty($ConfirmPass)){
          $ConfirmPass_error = 'please enter your password';
          $check = false;
        }else if($ConfirmPass != $pass ) {
          $ConfirmPass_error = 'password is not match';
          $check = false;
        }
      
        if($check == true){

            $file       = $_FILES['fileToUpload'];
            // print_r($file);
            $image=$file["name"];
            $new_image  =uniqid("IMG-", true).'.png';
            $file_des = "./uploads/".$new_image;
            move_uploaded_file($file['tmp_name'], $file_des);

            $signup_date = date("Y/m/d") ;

            $query = "INSERT INTO users(user_img,user_name,user_email,user_password,user_date) VALUES ('$new_image','{$_POST["fullName"]}','{$_POST["email"]}','{$_POST["pass"]}','$signup_date')";
            $exams_query = mysqli_query($conn,$query);

            //////////////////////
            $sql_user="SELECT * FROM users WHERE user_email='".$email."' AND user_password='".$pass."' limit 1 ";
    
            $result_user = mysqli_query($conn,$sql_user);
                
                    // session_start()
                    session_start();
                      if(!isset($_SESSION['user'])){
                       $row2 = $result_user->fetch_assoc();
                       $_SESSION['user'] = $row2['user_id'];
                      }
                        echo $_SESSION['user'];
                      header("Location:../index.php");
                
        }

        $check = false;
        if($check = true){
          echo "  ";
        }
        $check = true;


      }
      
?>

<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
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
		<h1>SignUp</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="post" enctype="multipart/form-data">
                      <div> <label for="fullName" class="form-label head-photo">User Name</label>
					<input class="text inp-marg" type="text" name="fullName" placeholder="Username" id="fullName" >
                        <small id="fullNameMessageError" class="form-text"><?php echo (isset($fullName_error))? $fullName_error:"";
                            ?></small></div> 

                       <div><label for="email" class="form-label head-photo">Email</label>
					<input class="text email inp-marg" type="email" name="email" placeholder="Email" id="email">
                        <small id="emailMessageError" class="form-text"><?php echo (isset($email_error))? $email_error:"";
                            ?></small></div> 

                       <div> <label for="pass" class="form-label head-photo">Password</label>
					<input class="text inp-marg" type="password" name="pass" placeholder="Password" id="pass">
                        <small id="passMessageError"  class="form-text"><?php echo (isset($pass_error))? $pass_error:"";
                            ?></small></div>

                        <div><label for="ConfirmPass" class="form-label head-photo">Confirm Password</label>
					<input class="text w3lpass inp-marg" type="password" name="ConfirmPass" placeholder="Confirm Password" id="ConfirmPass">
                        <small id="ConfirmPassMessageError" class="form-text"><?php echo (isset($ConfirmPass_error))? $ConfirmPass_error:"";
                            ?></small></div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label head-photo">select photo</label>
                        <input class="form-control inp-file inp-marg" type="file" id="fileToUpload" name="fileToUpload">
                        <small id="imgMessageError" class="form-text"><?php echo (isset($img_error))? $img_error:"";
                            ?></small>
                    </div> 
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGN UP" name="submit" id="submit">
				</form>
				<p>Already Have an account ? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	<!-- //main -->

    <script src="js/signUp.js"></script>
</body>
</html>
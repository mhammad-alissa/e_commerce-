<?php
    session_start();
    $user_id_session = $_SESSION['user'];

    $conn = mysqli_connect("localhost","root", "", "ecommerce")or die($conn->err);

    if (isset($_POST['update'])) {
        $user_id = $_POST['userId'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $conn->query("UPDATE users SET user_name ='$user_name',
        user_email = '$user_email',
        user_password ='$user_password' WHERE user_id = '$user_id_session' ") || die($conn->error);
        
    }


    $query = "SELECT * FROM users WHERE user_id = $user_id_session";
    $result = $conn->query( $query);
    $row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container ">


        <div class="row align-items-start">
            <div class="card" style="width: 18rem;">
                <img src="./uploads/<?php echo $row['user_img'] ?>" class="card-img-top" alt="...">

            </div>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">User Info</div>
                    
                    <form action ="" method = "post">
                    <input type="hidden"  name="userId" value="<?php echo $row['user_id'] ?> ">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                        <input type="text" value = "<?php echo $row['user_name'] ?> " name = "user_name" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">User Email</span>
                        <input type="text" value = "<?php echo $row['user_email'] ?> " name = "user_email"class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Password </span>
                        <input type="text" value = "<?php echo $row['user_password'] ?> " name = "user_password"class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>

                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="update"> Save Changes</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        
   <a href="logout.php">logout</a>
</body>

</html>
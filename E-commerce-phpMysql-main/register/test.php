<?php
session_start();
$user_id_session = $_SESSION['user'];
$conn = mysqli_connect("localhost", "root", "", "ecommerce") or die($conn->err);
$imagepath = "";

function path()
{
    global $imagepath;
    $image = $_FILES['filename'] ?? null;
    $imagepath  = "";
    if ($image && $image['tmp_name']) {
        $imagepath = "./uploads/" . uniqid() . $image['name'];
        

        move_uploaded_file($image['tmp_name'], $imagepath);
    }
}
if (isset($_POST['update'])) {
    $user_id       = $_POST['userId'];
    $user_name     = $_POST['user_name'];
    $user_email    = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    path();
    if (!$imagepath) {
        $sql = "SELECT * from users WHERE user_id = '{$_SESSION['user']}'";
        $result = mysqli_query($conn, $sql);
        $row   =  mysqli_fetch_assoc($result);
        $imagepath =  $row['user_img'];
    }
    $conn->query("UPDATE users SET user_name ='$user_name',
        user_email = '$user_email',
        user_password ='$user_password',
        user_img = '{$imagepath}'  WHERE user_id = '$user_id_session' ");
}


$query = "SELECT * FROM users  WHERE user_id = $user_id_session ";

$result = $conn->query($query);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
   
</head>


<body>
    <div class="container  m-auto justify-content-center ">


        <div class="row  m-auto">
            <div class="card circle m-auto pt-5" style="width: 18rem;">
                <img src="./uploads/<?php echo @$row['user_img'] ?>" class="card-img-top" alt="...">

            </div>


            <div class="col-lg-9 m-auto  ">
                <div class="card mt-3 p-3">
                    <h4 class=" mb-2">User Info</h4>
                    <!-- <div class="card-header mb-2">User Info</div> -->

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="userId" value="<?php echo @$row['user_id'] ?> ">
                        <div class="input-group mb-3  ">
                            <span class="input-group-text " id="inputGroup-sizing-default ">Username</span>
                            <input type="text" value="<?php echo @$row['user_name'] ?> " name="user_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3  ">
                            <span class="input-group-text" id="inputGroup-sizing-default">User Email</span>
                            <input type="text" value="<?php echo @$row['user_email'] ?> " name="user_email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3 ">
                            <span class="input-group-text" id="inputGroup-sizing-default">Password </span>
                            <input type="password" value="<?php echo @$row['user_password'] ?> " name="user_password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div>
                            <input type="file" id="myFile" name="filename">
                        </div>


                        <div class="form-actions form-group float-right">
                            <button type="submit" class="btn btn-primary btn-sm" name="update"> Save Changes</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

        <a href="logout.php">logout</a>
</body>

</html>
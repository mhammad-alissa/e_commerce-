<?php
include 'header.php';
include 'connection.php';
include 'process.php';
//edit user's info
$update        = false; // change button
$user_name = $user_email = $user_password = $user_phone = '';
if (isset($_GET['edit_user'])) {
    $id            = $_GET['edit_user'];
    $update        = true;
    $result        = $conn->query("SELECT * FROM users WHERE user_id ='$id'") or die($conn->error);
    $row           = $result->fetch_array();
    $user_name     = $row['user_name'];
    $user_email    = $row['user_email'];
    $user_password = $row['user_password'];
}
?>

<div class="right_col" role="main">
    <div class="">
        <!-- form start -->
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header h4">Users </div>
                        <div class="card-body card-block">
                            <form action="./process.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <input type="hidden" name="user_id_hidden" value="<?php echo $id ?>">
                                    <!--  -->
                                    <div class="input-group">
                                        <div class="input-group-addon">Username</div>
                                        <input type="text" id="username3" name="user_name" class="form-control" value="<?php echo $user_name ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Email</div>
                                        <input type="email" id="email3" name="user_email" class="form-control" value="<?php echo $user_email ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Password</div>
                                        <input type="password" id="password3" name="user_password" class="form-control" value="<?php echo $user_password ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <?php if ($update == true) { ?>
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block w-100 float-right" name="update_user">
                                                <span id="payment-button-amount">update</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        <?php } else { ?>
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block w-100 float-right" name="add_user">
                                                <i class="fa fa-plus"></i>&nbsp;
                                                <span id="payment-button-amount">Add User</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title h6">#</th>
                                            <th class="column-title h6"> Name</th>
                                            <th class="column-title h6"> Email </th>
                                            <th class="column-title h6">Password </th>
                                            <th class="column-title h6">Last Login </th>
                                            <th class="column-title h6">Image </th>
                                            <th></th>
                                            <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $conn->query("SELECT * FROM users") or die($conn->error);
                                        while ($row = $result->fetch_assoc()) { ?>
                                            <tr class="even pointer">
                                                <td><?php echo $row['user_id'] ?></td>
                                                <td> <?php echo $row['user_name'] ?></td>
                                                <td><?php echo $row['user_email'] ?></td>
                                                <td><?php echo $row['user_password'] ?></td>
                                                <td><?php echo $row['user_date'] ?></td>
                                                <td><img src="../uploads/<?php echo $row['user_img'] ?>" alt="" class="w-25" id='image_in_table'></td>
                                                <td>
                                                    <a href="manage_users.php?edit_user=<?php echo $row['user_id'] ?>" class="item" data-toggle="tooltip" data-placement="top" name="Edit">
                                                        <i class="fas fa-pen h5"></i>
                                                    </a>
                                                </td>
                                                <td> <a href="process.php?delete_user=<?php echo $row['user_id'] ?>" class="item  " data-toggle="tooltip" data-placement="top" name="Delete">
                                                        <i class="fas fa-trash h5 "></i>
                                                    </a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>

    <?php include './footer.php'; ?>
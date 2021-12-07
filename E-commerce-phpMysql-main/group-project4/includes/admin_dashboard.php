<?php 
include './header.php';
include 'connection.php';
include './process.php';


//edit admin's info
$update     = false;
$admin_name = $admin_email = $admin_password  = $admin_image = '';
if (isset($_GET['edit_admin'])) {
    $update        = true;
    $id             = $_GET['edit_admin'];
    $result         = $conn->query("SELECT * FROM admins WHERE admin_id ='$id'") or die($conn->error);
    $row            = $result->fetch_array();
    $admin_name     = $row['admin_name'];
    $admin_email    = $row['admin_email'];
    $admin_password = $row['admin_password'];
    $admin_image    = $row['admin_email']; 
}
 ?>

<div class="right_col" role="main">
    <div class="">
        <!-- form start -->
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header h4">Admins </div>
                        <div class="card-body card-block">
                            <form action="./process.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <input type="hidden" name="admin_id_hidden" value="<?php echo $id ?>">
                                    <!--  -->
                                    <div class="input-group">
                                        <div class="input-group-addon">Username</div>
                                        <input type="text" id="username3" name="admin_name" class="form-control" value="<?php echo $admin_name ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Email</div>
                                        <input type="email" id="email3" name="admin_email" class="form-control" value="<?php echo $admin_email ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Password</div>
                                        <input type="password" id="password3" name="admin_password" class="form-control" value="<?php echo $admin_password ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mb-3 ">
                                <div class="form-group">
                                <?php  
                                if ($update == true) { 
                                ?>
                                
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block w-100 float-right" name="update_admin">
                                                <span id="payment-button-amount">update</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        <?php } else { ?>
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block  w-100 float-right" name="add_admin">
                                                <i class="fa fa-plus"></i>&nbsp;
                                                <span id="payment-button-amount ">Add Admain</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        <?php } ?>
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
                                    $result = $conn->query("SELECT * FROM admins") or die($conn->error);
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr class="even pointer">
                                            <td ><?php echo $row['admin_id']?></td>
                                            <td ><?php echo $row['admin_name']?></td>
                                            <td ><?php echo $row['admin_email']?></td>
                                            <td ><?php echo $row['admin_password']?></td>
                                            <td ><?php echo $row['admin_date']?></td>
                                            <td ><img class="w-25" src="../uploads/<?php echo $row['admin_img']?>"></td>
                                            <td>
                                                <a href="./admin_dashboard.php?edit_admin=<?php echo $row['admin_id'] ?>" class="item" data-toggle="tooltip" data-placement="top" name="Edit">
                                                    <i class="fas fa-pen h5"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="process.php?delete_admin=<?php echo $row['admin_id'] ?>" class="item  " data-toggle="tooltip" data-placement="top" name="Delete">
                                                    <i class="fas fa-trash h5 "></i>
                                                </a>
                                            </td>
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
<?php
include './header.php';
include 'connection.php';
include './process.php';
$result = $conn->query("SELECT * FROM categories") or die($conn->error);

?>


<div class="right_col" role="main">
    <div class="">
        <!-- form start -->
        <div class="container-fluid m-t-30">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header h4">Categories </div>
                        <div class="card-body card-block">
                            <!-- form start  -->
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <input type="hidden" name="category_id" value="<?php echo $id ?>">
                                    <div class="input-group">
                                        <div class="input-group-addon">Category</div>
                                        <input type="text" id="username3" name="category_name" class="form-control" value="<?php echo $category; ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <?php if ($update == true) { ?>
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block w-100 float-right" name="update_category">
                                                <span id="payment-button-amount">update</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        <?php } else { ?>
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block w-100 float-right" name="add_category">
                                                <i class="fa fa-plus"></i>&nbsp;
                                                <span id="payment-button-amount">Add Category</span>
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
                                            <th class="column-title">Category Name</th>
                                            <th class="column-title">Category Image</th>
                                            <th></th>
                                            <th></th>
                                    </thead>

                                    <tbody>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <tr class="even pointer">
                                                <td class=" "> <?php echo $row['category_name'] ?></td>
                                                <td class=" "><img src="../uploads/<?php echo $row['category_img'] ?>" class="w-25" alt=""></td>
                                                <td>
                                                    <a href="./manage_categories.php?edit_cat=<?php echo $row['category_id'] ?>" class="item" data-toggle="tooltip" data-placement="top" name="edit_cat">
                                                        <i class="fas fa-pen h5"></i>
                                                    </a>
                                                </td>
                                                </td>
                                                <td>
                                                    <a href="process.php?delete_cat=<?php echo $row['category_id'] ?>" class="item" data-toggle="tooltip" data-placement="top" name="delete_cat">
                                                        <i class="fas fa-trash h5 "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    </tbody>
                                <?php endwhile; ?>
                                </table>
                            </div>


                        </div>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>

    </div>


    <?php
 include './footer.php'; ?>
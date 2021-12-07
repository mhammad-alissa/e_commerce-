<?php
include './header.php';
include 'connection.php';
include './process.php';
//edit Products
$update     = false;
if (isset($_GET['edit_product'])) {
    $update      = true;
    $id          = $_GET['edit_product'];
    $result      = $conn->query("SELECT * FROM products WHERE product_id ='$id'") or die($conn->error);
    $row         = $result->fetch_array();

    $p_name      = $row['product_name'];
    $p_des       = $row['product_description'];
    $price       = $row['product_price'];  
    $sale_price  = $row['product_sale_price'];  
    $sale_q      = $row['product_quantity'];  
    $category    = $row['category_id'];  
    $tags        = $row['product_tags'];  
    $sale_status = $row['product_sale_status'];  
}
?>
<div class="right_col" role="main">
    <div class="">
        <!-- form start -->
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header h4">Products</div>
                        <div class="card-body card-block">
                            <form action="./process.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <!-- to add id throw url  -->
                                    <input type="hidden" name="product_id_hidden" value="<?php echo $id ?>">
                                    <div class="input-group">
                                        <div class="input-group-addon">Product Name</div>
                                        <input type="text" name="name" class="form-control" value="<?php echo $p_name  ?>">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Description </div>
                                        <input type="text"  name="product_des" class="form-control" value="<?php echo $p_des ?>">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-addon">Product Price</div>
                                    <input type="number" name="product_price" class="form-control"  value="<?php echo $price ?>">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"> Price on sale</div>
                                    <input type="number" name="product_on_sale" class="form-control"  value="<?php echo $sale_price ?>">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"> sale Status</div>
                                    <input type="number" name="product_sale_flag" class="form-control"  value="<?php echo $sale_status ?>">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon">Quantity</div>
                                    <input type="number" name="product_quantity" class="form-control"  value="<?php echo $sale_q ?>">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon">Product Tags</div>
                                    <input type="text" name="product_tag" class="form-control"  value="<?php echo  $tags ?>">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Product Main Image </div>
                                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Product Sub Image1 </div>
                                        <input type="file" name="fileToUpload2" id="fileToUpload2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Product Sub Image2 </div>
                                        <input type="file" name="fileToUpload3" id="fileToUpload3" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-select w-100  p-2" name='category_name' value="">
                                        <?php
                                        $query               = "SELECT * FROM categories ";
                                        $category_query      = mysqli_query($conn, $query);
                                        while ($row          = mysqli_fetch_assoc($category_query)) {
                                            $category_id2    = $row['category_id'];
                                            $category_name2  = $row['category_name'];
                                            echo "<option class='w-100' value='{$category_id2}'>{$category_name2}<?option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <?php if ($update == true) { ?>
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block w-100 float-right" name="update_product">
                                                <span id="payment-button-amount">update</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        <?php } else { ?>
                                            <button type="submit" id="add-button" class="btn btn-lg btn-block w-100 float-right" name="add_product">
                                                <i class="fa fa-plus"></i>&nbsp;
                                                <span id="payment-button-amount">Add Products</span>
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
                                            <th class="column-title">#</th>
                                            <th class="column-title">Product Name </th>
                                            <th class="column-title">Description </th>
                                            <th class="column-title"> Main Image </th>
                                            <th class="column-title"> Image2</th>
                                            <th class="column-title"> Image3</th>
                                            <th class="column-title">Price</th>
                                            <th class="column-title">PoS</th>
                                            <th class="column-title">Sale Status </th>
                                            <th class="column-title">Quitity </th>
                                            <th class="column-title">Tags</th>
                                            <th class="column-title">Category </th>
                                            <th></th>
                                            <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query         = "SELECT products.product_id, products.product_name, products.product_description, product_sale_price,
                                                             products.product_main_img, products.product_sub1_img, products.product_sub2_img,
                                                             products.product_price,  products.product_sale_status, products.product_tags, products.product_quantity,
                                                             categories.category_name 
                                                     FROM products
                                                     JOIN categories ON products.category_id = categories.category_id ";

                                        $order_query   = mysqli_query($conn, $query);
                                        while ($row  = mysqli_fetch_assoc($order_query)) { ?>
                                            <tr class="even pointer">
                                                <td><?php echo $row['product_id'] ?></td>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['product_description'] ?></td>
                                                <td><img class="w-75" src="../uploads/<?php echo $row['product_main_img'] ?>" alt=""></td>
                                                <td><img class="w-75" src="../uploads/<?php echo $row['product_sub1_img'] ?>" alt=""></td>
                                                <td><img class="w-75" src="../uploads/<?php echo $row['product_sub2_img'] ?>" alt=""></td>
                                                <td><?php echo $row['product_price'] ?></td>
                                                <td><?php echo $row['product_sale_price'] ?></td>
                                                <td><?php echo $row['product_sale_status'] ?></td>
                                                <td><?php echo $row['product_quantity'] ?></td>
                                                <td><?php echo $row['product_tags'] ?></td>
                                                <td><?php echo $row['category_name'] ?></td>
                                                <td>
                                                    <a href="manage_products.php?edit_product=<?php echo $row['product_id'] ?>" class="item" data-toggle="tooltip" data-placement="top" name="Edit">
                                                        <i class="fas fa-pen h5"></i>
                                                    </a>
                                                </td>
                                                <td> <a href="process.php?delete_product=<?php echo $row['product_id'] ?>" class="item  " data-toggle="tooltip" data-placement="top" name="Delete">
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
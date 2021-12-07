<?php 
include './header.php'; 
include './connection.php';

?>
<div class="right_col" role="main">
    <div class="">
        <!-- form start -->
        <div class="container-fluid">
    
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
                                            <th class="column-title h6">User Name</th>
                                            <th class="column-title h6"> Order status </th>
                                            <th class="column-title h6">Order Product</th>
                                            <th class="column-title h6">Order Date</th>
                                            <th class="column-title h6">Order Quantity</th>
                                            <th></th> 
                                    </thead>
                                    <tbody>
                                    <?php  
                                    $query         = "SELECT orders.order_id, orders.order_status, orders.order_date, orders.product_countete, orders.order_date, orders.product_countete,
                                                           users.user_name, products.product_main_img  
                                                   FROM orders
                                                   JOIN users    ON orders.user_id    = users.user_id
                                                   JOIN products ON orders.product_id = products.product_id";
                                    $order_query   = mysqli_query($conn, $query);
                                      while ($row  = mysqli_fetch_assoc($order_query)) {?>
                                         <tr class ="even pointer">
                                            <td><?php echo $row['order_id'] ?></td>
                                            <td><?php echo $row['user_name'] ?></td>
                                            <td><?php echo $row['order_status'] ?></td>
                                            <td><img src="../uploads/<?php echo $row['product_main_img'] ?>" alt=""></td>
                                            <td><?php echo $row['order_date'] ?></td>
                                            <td><?php echo $row['product_countete'] ?></td>
                                            <td>
                                                <a href = "process.php?delete_order=<?php echo $row['order_id'] ?>" class="item  " data-toggle="tooltip" data-placement="top" name="Delete">
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
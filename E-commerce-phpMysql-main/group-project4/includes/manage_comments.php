<?php 
include './header.php';
include 'connection.php';

 ?>
<div class="right_col" role="main">

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
                                        <th class="column-title h6">Product Name</th>
                                        <th class="column-title h6">Comment Content </th>
                                        <th class="column-title h6">Comment Date </th>
                                        <th></th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query       = "SELECT comments.comment_id, comments.comment_content, comments.comment_date, 
                                                           users.user_name, products.product_id  
                                                   FROM comments
                                                   INNER JOIN users    ON comments.user_id    = users.user_id
                                                   INNER JOIN products ON comments.product_id = products.product_id";
                                    $order_query  = mysqli_query($conn, $query);

                                    while ($row   = mysqli_fetch_assoc($order_query)) { ?>
                                        <tr class="even pointer">
                                            <td><?php echo $row['comment_id'] ?></td>
                                            <td><?php echo $row['user_name'] ?></td>
                                            <td><?php echo $row['product_id'] ?></td>
                                            <td><?php echo $row['comment_content'] ?></td>
                                            <td><?php echo $row['comment_date'] ?></td>
                                            <td>
                                                <a href="process.php?delete_comment=<?php echo $row['comment_id'] ?>" class="item  " data-toggle="tooltip" data-placement="top" name="Delete">
                                                    <i class="fas fa-trash h5 "></i>
                                                </a>
                                            </td>
                                        </tr>
                                </tbody>
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
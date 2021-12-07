<?php
include 'includes/header-user.php';

if (isset($_GET['delete-cart'])) {
	unset($_SESSION['cart']);
}

?>
<!-- Shoping Cart -->
<?php
if (isset($_SESSION['cart'])) { ?>

	<form class="bg0 p-t-150 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								<?php
								if (!empty($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $key => $value) {
										if (isset($_GET['Proceed-to-Checkout'])) {
											if (isset($_SESSION['user'])) {
												$id_product = $value['id'];
												//  $_SESSION['user'] = $row2['user_id'];
												$a = $_SESSION['user'];
												$order_date = date("Y/m/d");
												$query = "INSERT INTO orders(user_id , product_id, order_date ) VALUES ($a, $id_product, $order_date)";
												$admin_query = mysqli_query($conn, $query);
												 
											} else {
												echo "<h4 class=\"text-center p-4 text-danger \"> You have to <u> <a href=\"register/login.php\" class=\" text-dark\"> Login </a> </u> to place your order! </h4>";
											}
										}
								?>
										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="./group-project4/uploads/<?php echo @$value['img'] ?>" alt="IMG">
												</div>
											</td>
											<td class="column-2 font-weight-bold"><?php
																					echo @$value['name'];
																					?></td>
											<td class="column-3 font-weight-bold text-danger">$<?php echo @$value['price']; ?></td>
											<td class="column-4 font-weight-bold text-danger">
												<b><?php echo $value['num-product'] ?></b>
											</td>
											<!-- cal to price -->
											<td class="column-5 font-weight-bold">$<?php echo @$value['price'] * @$value['num-product']  ?></td>
                                            <!-- end cal to price -->
										</tr>
                                               
										<?php @$total += $value['price'] * $value['num-product']; ?>
								<?php }
								} ?>
							</table>
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
							</div>
							<form method="get">
								<button name="delete-cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
									Delete Cart
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals

						</h4>
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2 font-weight-bold">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2 text-danger font-weight-bold">
									<?php echo "$" . @$total; ?>
								</span>
							</div>
						</div>

						<form method="get">
							<button  name="Proceed-to-Checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								 Proceed to Checkout
							</button>
						</form>
						<div class="flex-c-m stext-101 cl2 size-116 b ">
							" CASH ON DELEVRY "
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php } else { ?>
	<div style="margin-bottom:200px" class="d-flex justify-content-center"> </div>
	<h2 class="d-flex justify-content-center"> There isn't any item in your cart!</h2>
	<h1 class="d-flex justify-content-center pt-5"><i class="fas fa-shopping-cart"></i></h1>
	<div style="margin-bottom:400px" class="d-flex justify-content-center"> </div>
<?php } ?>




<?php
include 'includes/footer-user.php';

?>
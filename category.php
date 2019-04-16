	<?php
	session_start();
	include "include/headers.php";
	include "include/db.php";

	if(!isset($_GET['category_id'])){
		
		$query="SELECT * FROM product";
		$result=mysqli_query($connected,$query);
		if(!$result)
		{
			echo mysqli_error($connected);
		}
	}
	else
	{
		$category_id=$_GET['category_id'];
		$query="SELECT * FROM product where category_id='{$category_id}'";
		$result=mysqli_query($connected,$query);
		if(!$result)
		{
			echo mysqli_error($connected);
		}
	}
	if(isset($_GET['cart']))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			
			$_SESSION['shopping_cart']=array();
			array_push($_SESSION['shopping_cart'], $_GET['cart']);
			echo "HELLO";
		}
		else
		{
			
			array_push($_SESSION['shopping_cart'], $_GET['cart']);

		}

	}
	if(isset($_GET['used'])){
		
		$query="SELECT * FROM product where used=1";
		$result=mysqli_query($connected,$query);
		if(!$result)
		{
			echo mysqli_error($connected);
		}
	}

	 ?>
	
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shop Category Page</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="category.html">Category</a>
						<a href="category.html">Women Fashion</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						<div class="left_dorp">
							<select class="sorting">
								<option value="1">Default sorting</option>
								<option value="2">Default sorting 01</option>
								<option value="4">Default sorting 02</option>
							</select>
							<select class="show">
								<option value="1">Show 12</option>
								<option value="2">Show 14</option>
								<option value="4">Show 16</option>
							</select>
						</div>
						<div class="right_page ml-auto">
							<nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
										</a>
									</li>
									<li class="page-item active">
										<a class="page-link" href="#">1</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">3</a>
									</li>
									<li class="page-item blank">
										<a class="page-link" href="#">...</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">6</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="latest_product_inner row">
						<?php
						while($row=mysqli_fetch_assoc($result)){
						echo "<div class=\"col-lg-3 col-md-3 col-sm-6\">
							<div class=\"f_p_item\">
								<div class=\"f_p_img\">";
									
										$prod=$row['product_id'];
										$image=$row['image'];
										$title=$row['product_name'];
										$quantity=$row['quantity'];
									echo "<img class=\"img-fluid\" src=\"{$image}\" >
									<div class=\"p_icon\">
										<a href=\"#\">
											<i class=\"lnr lnr-heart\"></i>
										</a>
										<a href=\"category.php?cart={$prod}\">
											<i class=\"lnr lnr-cart\"></i>
										</a>
									</div>
								</div>
								<a href=\"single-product.php?details={$prod}\">
									<h4>{$title}</h4>
								</a>
								<h5>{$quantity}</h5>";
							
						echo "	</div>
						</div>";
						}?>
						<!-- <div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="img/product/feature-product/f-p-2.jpg" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h4>Long Sleeve TShirt</h4>
								</a>
								<h5>$150.00</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="img/product/feature-product/f-p-3.jpg" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h4>Long Sleeve TShirt</h4>
								</a>
								<h5>$150.00</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="img/product/feature-product/f-p-4.jpg" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h4>Long Sleeve TShirt</h4>
								</a>
								<h5>$150.00</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="img/product/feature-product/f-p-5.jpg" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h4>Long Sleeve TShirt</h4>
								</a>
								<h5>$150.00</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="img/product/feature-product/f-p-4.jpg" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h4>Long Sleeve TShirt</h4>
								</a>
								<h5>$150.00</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="img/product/feature-product/f-p-3.jpg" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h4>Long Sleeve TShirt</h4>
								</a>
								<h5>$150.00</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="img/product/feature-product/f-p-4.jpg" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h4>Long Sleeve TShirt</h4>
								</a>
								<h5>$150.00</h5>
							</div>
						</div>-->
				</div> 
				</div>
				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Browse Categories</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									<li>
										<a href="category.php">All</a>
									</li>
									<li>
										<a href="category.php?category_id=1">Processor</a>						
									</li>
									<li>
										<a href="category.php?category_id=2">Motherboard</a>
									</li>
								
								</ul>
							</div>
						</aside>
						<aside class="left_widgets p_filter_widgets">
							<div class="l_w_title">
								<h3>Product Filters</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									<li>
										<a href="category.php?used=1">Used Item</a>
									</li>
									
								</ul>
							</div>
							<!-- <div class="widgets_inner">
								<h4>Color</h4>
								<ul class="list">
									<li>
										<a href="#">Black</a>
									</li>
									<li>
										<a href="#">Black Leather</a>
									</li>
									<li class="active">
										<a href="#">Black with red</a>
									</li>
									<li>
										<a href="#">Gold</a>
									</li>
									<li>
										<a href="#">Spacegrey</a>
									</li>
								</ul>
							</div> -->
						<!-- 	<div class="widgets_inner">
							<h4>Price</h4>
							<div class="range_item">
								<div id="slider-range"></div>
								<div class="row m0">
									<label for="amount">Price : </label>
									<input type="text" id="amount" readonly>
								</div>
							</div>
						</div> -->
						</aside>
					</div>
				</div>
			</div>

			<div class="row">
				<nav class="cat_page mx-auto" aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">01</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">02</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">03</a>
						</li>
						<li class="page-item blank">
							<a class="page-link" href="#">...</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">09</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
	<?php 
		include "include/footer.php";
		?>
<?php
include "header.php";
?>

	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Courses</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- search section -->
	<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Search your course</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form class="course-search-form">
							<input type="text" placeholder="Course">
							<input type="text" class="last-m" placeholder="Category">
							<button class="site-btn btn-dark">Search Couse</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->


	<!-- course section -->
	<section class="course-section spad pb-0">
		<div class="course-warp">
			<?php 
			include "Admin/connection.php";
			$sql="select * from `categories`";
			$res=mysqli_query($con,$sql);
			?>
			<ul class="course-filter controls">
				<li class="control active" data-filter="all">All</li>
				<?php
				while($row=mysqli_fetch_assoc($res))
				{
				?>
					<li class="control" data-filter=".<?php echo $row['Cat_name']; ?>"><?php echo $row['Cat_name'] ?></li>
				<?php
				}
				?>
			</ul>                                       
			<div class="row course-items-area">
				<!-- course -->
				<?php
					$sql1="select categories.Cat_name as cattile,course.Cou_name,course.Cou_dis,course.Cou_pric,course.Cou_video,course.Cou_img,
					course.id as cid,course.Cou_Sdec from course inner join categories on course.Cou_Cnm=categories.id";
					$res1=mysqli_query($con,$sql1);
				?>
				<?php
				while($row1=mysqli_fetch_assoc($res1))
				{
				?>
				<div class="mix col-lg-3 col-md-4 col-sm-6 <?php echo $row1['cattile'] ?>">
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="Admin/<?php echo $row1['Cou_img'];  ?>">
							<div class="price">Price: $<?php echo $row1['Cou_pric'] ?></div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5><?php echo $row1['Cou_name'] ?></h5>
								<p><?php echo $row1['Cou_Sdec'] ?></p>
							</div>
							<div class="course-author">
								<div class="btn btn" style="text-align: center;"><a href="single-course.php?id=<?php echo $row1['cid'] ?>" class="site-btn header-btn">Read More</a></div>
								
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				?>
				<!-- course -->
			</div>
		</div>
	</section>
	<!-- course section end -->


	<!-- banner section -->
	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Join Our Community Now!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="text-center pt-5">
				<a href="#" class="site-btn">Register Now</a>
			</div>
		</div>
	</section>
	<!-- banner section end -->

	<?php
	include "footer.php";
	?>
	
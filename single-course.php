<?php
include "header.php";
include "Admin/connection.php";
?>
<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="select * from `course` where `id`='$id'";
	// $sql="select categories.Cat_name as cattile,course.Cou_name,course.Cou_dis,course.Cou_pric,course.Cou_video,course.Cou_img,
	// course.id as cid,course.Cou_Sdec from course inner join categories on course.Cou_Cnm=categories.id where `id`='$id'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
}
?>

	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/2.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Courses</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- search section -->
	
	<!-- search section end -->


	<!-- single course section -->
	<section class="single-course spad pb-0">
		<div class="container">
			<div class="course-meta-area">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="course-note">Featured Course</div>
						<h3><?php echo $row['Cou_name'] ?></h3>
						<div class="course-metas">
							
							<div class="course-meta">
								<div class="cm-info">
									<h6>Category</h6>
									<p>Development</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Students</h6>
									<p>120+ Registered Students</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Reviews</h6>
									<p>2 Reviews <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star is-fade"></i>
									</span></p>
								</div>
							</div>
						</div>
						<a href="#" class="site-btn price-btn">Price: $<?php echo $row['Cou_pric'] ?></a>
						<a href="#" class="site-btn buy-btn">Buy This Course</a>
					</div>
				</div>
			</div>
			<?php
			 $data=$row['Cou_video'];
			 $final=str_replace('watch?v=','embed/',$data);
			?>
			<iframe width="100%" height="515" class="course-preview" src="<?php echo  $final; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			
			<div class="row">
				<div class="col-lg-10 offset-lg-1 course-list">
					<div class="cl-item">
						<h4>Course Description</h4>
						<p><?php echo $row['Cou_dis'] ?></p>
					</div>
					<!-- <div class="cl-item">
						<h4>Certification</h4>
						<p>Phasellus sollicitudin et nunc eu efficitur. Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum, ut vulputate mauris ligula a metus. Aenean vel congue diam, sed bibendum ipsum. Nunc vulputate aliquet tristique. Integer et pellentesque urna. Lorem ipsum dolor sit amet, consectetur. Phasellus sollicitudin et nunc eu efficitur. Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum.</p>
					</div>
					<div class="cl-item">
						<h4>The Instructor</h4>
						<p>Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum, ut vulputate mauris ligula a metus. Aenean vel congue diam, sed bibendum ipsum. Nunc vulputate aliquet tristique. Integer et pellentesque urna. Lorem ipsum dolor sit amet, consectetur. Phasellus sollicitudin et nunc eu efficitur. Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum, ut vulputate mauris ligula a metus. </p>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	<!-- single course section end -->


	<!-- Page -->
	<section class="realated-courses spad">
		<div class="course-warp">
			<h2 class="rc-title">Realated Courses</h2>
			<div class="rc-slider owl-carousel">
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
				<div class="course-item">
					<div class="course-thumb set-bg" data-setbg="Admin/<?php echo $row1['Cou_img'];  ?>">
						<div class="price">Price: $15</div>
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
				<?php
				}
				?>
			</div>
		</div>
	</section>
	<!-- Page end -->


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

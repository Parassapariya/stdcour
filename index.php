
<?php
include "header.php";
session_start();

?>
<?php
	include "Admin/connection.php";

    if(isset($_POST['cbtn1']))
    {
        $cnm=$_POST['cnm'];
        $cemail=$_POST['cemail'];
        $csub=$_POST['csub'];
        $cnumber=$_POST['cnumber'];
        $cmessage=$_POST['cmessage'];
        $sql="INSERT INTO `contect`(`name`, `email`, `subject`, `mobileno`, `message`) VALUES 
        ('$cnm','$cemail','$csub','$cnumber','$cmessage')";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            $_SESSION['sbt']="send";
         
       
            if(isset($_SESSION['sbt']))
            {
            //echo "yes";
                header("location:index.php");
            }
        }
    }

?>
<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="img/hm2.jpg">
    <div class="container">
        <div class="hero-text text-white">
            <h2>Get The Best Free Online Courses</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla <br> dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
        </div>
      
    </div>
</section>
<!-- Hero section end -->

<?php 


    $sql="select * from `categories`";
	$res1=mysqli_query($con,$sql);
?>


<!-- categories section -->
<section class="categories-section spad">
    <div class="container">
        <div class="section-title">
            <h2>Our Course Categories</h2>
            <p>We are provide some courses.......</p>
        </div>
        <div class="row">
            <!-- categorie -->
            <?php
				while($row1=mysqli_fetch_assoc($res1))
				{
				?>
            <div class="col-lg-4 col-md-6">
          
                <div class="categorie-item">
                    <div class="ci-thumb set-bg" data-setbg="Admin/<?php echo $row1['Cat_img']; ?>"></div>
                    <div class="ci-text">
                        <h5><?php echo $row1['Cat_name']; ?></h5>
                    </div>
                </div>
                
            </div>
            <?php
				}
				?>
        </div>
    </div>
</section>
<!-- categories section end -->


<!-- signup section -->
<section class="signup-section spad">
    <div class="signup-bg set-bg" data-setbg="img/signup-bg.jpg"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="signup-warp">
                    <div class="section-title text-white text-left">
                        <h2>For Any Inqury!!!</h2>
                        <p>Any Problam Please Contect Us Our team Replay Soon As Posible...... </p>
                    </div>
                    <!-- signup form -->
                    <form action="index.php" method="post" class="contact-form">
							<input type="text" name="cnm" placeholder="Your Name">
							<input type="text" name="cemail" placeholder="Your E-mail">
							<input type="text" name="csub" placeholder="Subject">
							<input type="text" name="cnumber" placeholder="Mobile Number">
							<textarea name="cmessage" placeholder="Message"></textarea>
							<button name="cbtn1" class="site-btn">Sent Message</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- signup section end -->


<!-- course section -->
<section class="course-section spad">
    <div class="container">
        <div class="section-title mb-0">
            <h2>Featured Courses</h2>
            <p></p>
        </div>
    </div>
    <div class="course-warp">
        <?php 
			$sql="select * from `categories`";
			$res=mysqli_query($con,$sql);
		?>
        <ul class="course-filter controls">
            <li class="control active" data-filter="all">All</li>
            <?php
				while($row=mysqli_fetch_assoc($res))
				{
			?>
            <li class="control" data-filter=".<?php echo $row['Cat_name']; ?>"><?php echo $row['Cat_name']; ?></li>
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
        </div>
    </div>
</section>
<!-- course section end -->



<?php

include "footer.php";
?>
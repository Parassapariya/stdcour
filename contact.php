
<?php
include "header.php";
include "Admin/connection.php";
session_start();
if(isset($_SESSION['sbt']))
{
    if($_SESSION['sbt']=="send")
    { ?>
      <script>
        // alert("asda");
        toastr.success('Click Button');
      </script>
    <?php
      $_SESSION['sbt']="";
    }
}
if(isset($_POST['cbtn']))
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
		    header("location:contact.php");
        }
    }
}

?>
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Contact</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<!-- Page -->
	<section class="contact-page spad pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="contact-form-warp">
						<div class="section-title text-white text-left">
							<h2>Get in Touch</h2>
							<p>Any Problam Please Contect Us Our team Replay Soon As Posible...... </p>
						</div>
						<form action="contact.php" method="post" class="contact-form">
							<input type="text" name="cnm" placeholder="Your Name">
							<input type="text" name="cemail" placeholder="Your E-mail">
							<input type="text" name="csub" placeholder="Subject">
							<input type="text" name="cnumber" placeholder="Mobile Number">
							<textarea name="cmessage" placeholder="Message"></textarea>
							<button name="cbtn" class="site-btn">Sent Message</button>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-info-area">
						<div class="section-title text-left p-0">
							<h2>Contact Info</h2>
						</div>
						<div class="phone-number">
							<span>Direct Line</span>
							<h2>+91 6352185553</h2>
						</div>
						<ul class="contact-list">
							<li>Street no 5 Vivekanand Nagar <br>, Kothariya Main Road , Rajkot</li>
							<li>+91 6352185553</li>
							<li>parassapariya212@gmail.com</li>
						</ul>
						<div class="social-links">
							<a href="#"><i class="fa fa-pinterest"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>
			</div>
			</div>
			</section>
			<div class="container-fluid m-0 p-0">
				<div id="map-canvas">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.6682544247046!2d70.78767627593474!3d22.29055314324741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959ca1820097fc7%3A0xfde370cdbfa433c3!2sShree%20Amrutlal%20Veerpal%20Parekh%20Technical%20Institute!5e0!3m2!1sen!2sin!4v1688217888124!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		

	<!-- Page end -->


	<!-- banner section -->
	
<?php
include "footer.php";
?>
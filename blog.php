<?php
include "header.php";

?>

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/3.jpg">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="#">Home</a>
            <span>Blog</span>
        </div>
    </div>
</div>
<!-- Page info end -->



<!-- Page  -->
<section class="blog-page spad pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading mt-0 pb-5" style=" text-align: center;">
                    <h2>OUR MATIRIAL</h2>
                    
                </div>
                <div class="alert alert-info alert-dismissible">
                    <b>Info:</b> Please Click On Downlord Button And Show After This PDF.....  
                    <button class="close" data-dismiss="alert">×</button>
                </div>
            </div>
            <?php
                include "Admin/connection.php";
                $sql="select * from `pdf`";
                $res=mysqli_query($con,$sql);
            ?>
            <?php
				while($row=mysqli_fetch_assoc($res))
				{
				?>
            <div class="col-md-4 mt-3">
                <!-- blog post -->
                <div class="card" style="width: 17rem; ">
                <img class="card-img-top" style=" height: 250px; width:auto; " src="img/page-bg/pdf.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['pdf_nm'] ?></h5>
                    <a href="Admin/<?php echo $row['pdf_img'];?>" class="btn btn-danger" download>Downlord</a>
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
<?php
include "heaader.php";
?>


	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/5.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Elements</span>
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


	<!-- Page -->
	<section class="elements-page spad pb-0">
		<div class="container">
			<div class="element">
				<h2 class="e-title">Buttons</h2>
				<a href="#" class="site-btn mr-3 mb-3 mb-md-0">Send Message</a>
				<a href="#" class="site-btn btn-dark mr-3 mb-3 mb-md-0">Send Message</a>
				<a href="#" class="site-btn btn-fade">Send Message</a>
			</div>
			<!-- Element -->
			<div class="element">
				<h2 class="e-title">Accordions & Tabs</h2>
				<div class="row">
					<div class="col-lg-6 mb-4 mb-lg-0">
						<!-- Accordions -->
						<div id="accordion" class="accordion-area">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Praesent neque metus, accumsan in sagittis eu, mattis vitae</button>
								</div>
								<div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingTwo">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Neque metus, accumsan in sagittis eu, mattis</button>
								</div>
								<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header active" id="headingThree">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">Vivamus sollicitudin nisi sit amet dolor varius, et porta</button>
								</div>
								<div id="collapse3" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<!-- Tabs -->
						<div class="tab-element">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Praesent neque metus</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Neque metus</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Vivamus sollici</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<!-- single tab content -->
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
								</div>
								<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Element -->
			<div class="element">
				<h2 class="e-title">Loaders</h2>
				<div class="row">
					<div class="col-lg-3 col-sm-6 cp-item">
						<div class="circle-progress" data-cpid="id-1" data-cpvalue="75" data-cpcolor="#e82154" data-cptitle="New Students"></div>
					</div>
					<div class="col-lg-3 col-sm-6 cp-item">
						<div class="circle-progress" data-cpid="id-2" data-cpvalue="83" data-cpcolor="#e82154" data-cptitle="New Teachers"></div>
					</div>
					<div class="col-lg-3 col-sm-6 cp-item">
						<div class="circle-progress" data-cpid="id-3" data-cpvalue="25" data-cpcolor="#e82154" data-cptitle="Creativity"></div>
					</div>
					<div class="col-lg-3 col-sm-6 cp-item">
						<div class="circle-progress" data-cpid="id-4" data-cpvalue="95" data-cpcolor="#e82154" data-cptitle="Prestige"></div>
					</div>
				</div>
			</div>
			<!-- Element -->
			<div class="element">
				<h2 class="e-title">Milestones</h2>
				<div class="row">
					<div class="col-lg-3 col-sm-6 fact-item">
						<h2>1200</h2>
						<p>New Students</p>
					</div>
					<div class="col-lg-3 col-sm-6 fact-item">
						<h2>15k</h2>
						<p>Grad Students</p>
					</div>
					<div class="col-lg-3 col-sm-6 fact-item">
						<h2>234</h2>
						<p>Qualified Teachers</p>
					</div>
					<div class="col-lg-3 col-sm-6 fact-item">
						<h2>3792</h2>
						<p>Amazing Courses</p>
					</div>
				</div>
			</div>
			<!-- Element -->
			<div class="element">
				<h2 class="e-title">Icon Boxes</h2>
				<div class="row">
					<div class="col-lg-4 col-md-6 icon-box">
						<h5><span>01.</span>Amazing Teachers</h5>
						<p>Donec molestie tincidunt tellus sit amet aliquet. Proin auctor nisi ut purus ele ifend, et auctor lorem.</p>
					</div>
					<div class="col-lg-4 col-md-6 icon-box">
						<h5><span>02.</span>Training Center</h5>
						<p>Molestie tincidunt tellus sit amet aliquet. Proin auctor nisi ut purus ele ifend, et auctor lorem hendrerit. </p>
					</div>
					<div class="col-lg-4 col-md-6 icon-box">
						<h5><span>03.</span>Training Center</h5>
						<p>Itincidunt tellus sit amet aliquet. Proin auctor nisi ut purus ele ifend, et auctor lorem hendrerit. </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page end -->

	<?php
include "footer.php";
?>
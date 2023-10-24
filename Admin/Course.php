<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?php
include "connection.php";

if(!isset($_SESSION['unm'])) {
	header("location:index.php");
}
include "header.php";


if(isset($_POST['sub']))
{
	$catid=$_POST['catid'];
	$Cou_nm=$_POST['Cou_nm'];
	$Cou_sdis=$_POST['Cou_sdis'];
	$Cou_dis=$_POST['Cou_dis'];
	$Cou_pric=$_POST['Cou_pric'];
	$Cou_ylink=$_POST['Cou_ylink'];
	$file_name=$_FILES['Cou_img']['name'];
	$file_temp=$_FILES['Cou_img']['tmp_name'];
	$nm=rand().$Cou_nm;
	$ext=end(explode(".",$file_name));
	$nfile=$nm.".".$ext;
	$file_destination="images/Cou_img/".$nfile;
	if(move_uploaded_file($file_temp,$file_destination))
	{
		$sql1="INSERT INTO `course`(`Cou_Cnm`,`Cou_name`,`Cou_Sdec`, `Cou_dis`, `Cou_pric`, `Cou_video`, `Cou_img`) VALUES 
		('$catid','$Cou_nm','$Cou_sdis','$Cou_dis','$Cou_pric','$Cou_ylink','$file_destination')";
		$res1=mysqli_query($con,$sql1);
		if($res1)
		{
			header("location:Course.php");
		}
	}
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				<h1 class="mb-3">Courses</h1>
					<div class="col-4">
						
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
				<div class="container">
						<button class="btn" style="background-color: #41A6DF;  float: right; color:white"
                data-toggle="modal" data-target="#myModal">+ ADD NEW</button>
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">ADD NEW COURSE</h4>
											<button type="button" class="close"  data-dismiss="modal">&times;</button>
										</div>
										<form action="Course.php" method="post" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group">
													<label for="exampleInputEmail1">Course Category</label>
													<select class="form-control" id="catid" name="catid">
														<option value="">Select Your Course Category</option>
													<?PHP
														$sql="select * from `categories`";
														$res=mysqli_query($con,$sql);
														while($row=mysqli_fetch_assoc($res))
													{?>
														<option value="<?php echo $row['id'];?>"><?php echo $row['Cat_name'];?></option> 
													<?php
													}
													?>
													</select>
												</div>
													<div class="form-group">
														<label>Course Name</label>
														<input type="text" class="form-control"  name="Cou_nm"
														id="product" placeholder="Ex:- Graphic Design">
													</div>	
													<div class="form-group">
														<label>Course Short Description</label>
														<input type="text" class="form-control"  name="Cou_sdis"
														id="discription" placeholder="Enter Course Description">
													</div>	
													<div class="form-group">
														<label>Course Description</label>
														<textarea  class="form-control"  name="Cou_dis"
														id="discription" placeholder="Enter Course Description"></textarea>
													</div>	
													<div class="form-group">
														<label>Course Price </label>
														<input type="number" class="form-control"  name="Cou_pric" id="price"
                                                         placeholder="Enter Course Price">
													</div>
													<div class="form-group">
														<label>Course YLink</label>
														<input type="text" class="form-control"  name="Cou_ylink" 
                                                        id="saleprice"  placeholder="Enter Course Ylink" >
													</div>
													<div class="form-group">
														<label>Course Image</label>
														<input type="file" id="file"  class="form-control" 
														onchange="return fileValidation()" name="Cou_img" placeholder="image" required>
													</div>
											</div>
                                            <div class="modal-footer">
												<button type="submit" name="sub" class="btn btn-primary">Submit</button>
											</div>
										</form>
                                        </div>
								</div>
							</div>
						</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
					

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<?php
						//$sql1="select * from `course`";
						$sql1="select categories.Cat_name as cattile,course.Cou_name,course.Cou_dis,course.Cou_pric,course.Cou_video,course.Cou_img,
						course.id as cid,course.Cou_Sdec from course inner join categories on course.Cou_Cnm=categories.id";
						$res=mysqli_query($con,$sql1);
					?>
						<div class="card-body table-responsive p-2">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
									<th>Sr No.</th>
									<th>Course Category</th>
									<th>Course</th>
									<th>Course Short Description</th>
									<th>Course Price</th>
									<th>Course Video Link</th>
									<th>Course Image</th>
									<th>Opration</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									while($row=mysqli_fetch_assoc($res))
									{
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['cattile'];?></td>
										<td><?php echo $row['Cou_name'];?></td>
										<td><?php echo $row['Cou_Sdec'];?></td>
										<td><?php echo $row['Cou_pric'];?></td>
										<td><?php echo $row['Cou_video'];?></td>
										<td><img src="<?php echo $row['Cou_img'];?>" size="100px" height="100px">
										<td>
											<button class="btn btn-warning"><a style="color:white;" href="Course_del.php?id=<?php echo $row['cid']; ?>"><i class="fa fa-trash" style="color:black"></i></a></button>
											<button type="button" class="btn editbtn btn-success openEditMdl" data-toggle="modal" data-img="<?php echo $row['Cat_img']; ?>" data-iid="<?php echo $row['id']; ?>" data-target="#editmodel"><i class="fa fa-edit"></i></button>
									</tr>
									<?php
									$i++;
									}
									?>	
							</tbody>
						</table>
					</div>
	</section>
</div>
<script>
	function fileValidation() {
	var fileInput =
		document.getElementById('file');
	 let button = document.querySelector(".btnchange");
	var filePath = fileInput.value;
 
	// Allowing file type
	var allowedExtensions =
			/(\.jpg|\.jpeg|\.png)$/i;
	 
	if (!allowedExtensions.exec(filePath)) {
		toastr.error('Please Select Valid File Extension!!!!!!!!!!!!!!');
		fileInput.value = '';
		return false;
	}
	else
	{
		button.disabled=false;
	}
}
	$(document).ready(function(){
		$('.editbtn').click(function(){
			$('#editmodel').modal('show');
				$tr = $(this).closest('tr');
				
					var data = $tr.children("td").map(function(){
						return $(this).text();
					}).get();
					console.log(data);
					$('#id1').val(data[0]);
					$('#Cou_nm').val(data[2]);
					$('#Cou_dis').val(data[3]);
					$('#Cou_pric').val(data[4]);
					$('#Cou_ylibnk').val(data[5]);
		});
	
	});
	$('#catid').change(function(){
			var catid = $(this).val();
			$.post("ajexproduct.php",
			{
				catid:catid,
			},
			function(data,status)
			{
				$('#subcatid').append(data);
			});		
		});

$(document).on("click", ".openEditMdl", function () {
	var mId = $(this).data('iid');
	$(".card-body #id111").val( mId );
	
});
</script>
<?php
include "footer.php";
?>  
				
<div class="modal fade" id="editmodel" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Course</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
									<form action="product_edit.php" method="post" enctype="multipart/form-data">
											<div class="card-body">
											<input type="hidden" name="id1" id="id111" value="">
													<div class="form-group">
														<label>Course Name</label>
														<input type="text" class="form-control"  name="Cou_nm"
														id="Cou_nm" value="" placeholder="enter product">
													</div>		
													<div class="form-group">
														<label>Course Description</label>
														<input type="text" class="form-control"  name="Cou_dis"
														id="Cou_dis" placeholder="enter discription">
													</div>	
													<div class="form-group">
														<label>Course Price</label>
														<input type="number"  value="" class="form-control"  
														name="Cou_pric" id="Cou_pric" placeholder="enter price">
													</div>
													<div class="form-group">
														<label>Course YLink </label>
														<input type="number" value="" class="form-control" 
														name="Cou_ylibnk" id="Cou_ylibnk" placeholder="enter quntity">
													</div>
													<div class="form-group">
														<label>Course Image</label>
														<input type="text" class="form-control" value="" name="Cou_img"  
														id="saleprice1"  placeholder="saleprice">
													</div>
													
												
											</div>
											<div class="modal-footer">
												<button type="submit" name="sub" class="btn btn-primary">Submit</button>
											</div>
										</form>
										</div>
	</div>
</div>
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
	$mat_nm=$_POST['mat_nm'];
	$file_name=$_FILES['mat_fil']['name'];
	$file_temp=$_FILES['mat_fil']['tmp_name'];
	$nm=rand().$mat_nm;
	$ext=end(explode(".",$file_name));
	$nfile=$nm.".".$ext;
	$file_destination="images/matirial/".$nfile;
	if(move_uploaded_file($file_temp,$file_destination))
	{
		$sql1="INSERT INTO `pdf`(`pdf_nm`,`pdf_img`) VALUES ('$mat_nm','$file_destination')";
		$res1=mysqli_query($con,$sql1);
		if($res1)
		{
			header("location:Matirials.php");
		}
	}
}
if(isset($_POST['subedit']))
{
    $id1=$_POST['id1'];
	$mat_nm=$_POST['mat_nm'];
    $sql2="UPDATE `pdf` SET `pdf_nm`='$mat_nm' WHERE `id`='$id1'";
    $res2=mysqli_query($con,$sql2);
	if($res2)
	{
		header("location:Matirials.php");
	}
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				<h1 class="mb-3">Courses Matirials</h1>
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
											<h4 class="modal-title">ADD NEW MATRIAL</h4>
											<button type="button" class="close"  data-dismiss="modal">&times;</button>
										</div>
										<form action="Matirials.php" method="post" enctype="multipart/form-data">
											<div class="card-body">
													<div class="form-group">
														<label>Matirial Name</label>
														<input type="text" class="form-control"  name="mat_nm"
														id="mat_nm1" placeholder="Ex:- PHP Pdf">
													</div>	
													<div class="form-group">
														<label>Matirial File</label>
														<input type="file" class="form-control"  name="mat_fil">
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
						$sql1="select * from `pdf`";
						// $sql1="select categories.Cat_name as cattile,course.Cou_name,course.Cou_dis,course.Cou_pric,course.Cou_video,course.Cou_img,
						// course.id as cid,course.Cou_Sdec from course inner join categories on course.Cou_Cnm=categories.id";
						$res=mysqli_query($con,$sql1);
					?>
						<div class="card-body table-responsive p-2">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
                                        <th>Sr No.</th>
                                        <th>Course Matirial</th>
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
										<td><?php echo $row['pdf_nm'];?></td>
										<td>
											<button class="btn btn-warning"><a style="color:white;" href="Matirialdel.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="color:black"></i></a></button>
											<button type="button" class="btn editbtn btn-success openEditMdl" data-toggle="modal" data-img="<?php echo $row['pdf_nm']; ?>" data-iid="<?php echo $row['id']; ?>" data-target="#editmodel"><i class="fa fa-edit"></i></button>
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
					$('#mat_nm').val(data[1]);
		});
	
	});

$(document).on("click", ".openEditMdl", function () {
	var mId = $(this).data('iid');
	$(".card-body #id111").val( mId );
	
});
$(document).on("click", ".openEditMdl", function () {
	var mId = $(this).data('img');
	$(".card-body #mat_nm").val( mId );
	
});
</script>
<?php
include "footer.php";
?>  
				
<div class="modal fade" id="editmodel" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Matirial</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
									<form action="Matirials.php" method="post" enctype="multipart/form-data">
											<div class="card-body">
											<input type="hidden" name="id1" id="id111" value="">
													<div class="form-group">
														<label>Matirial Name</label>
														<input type="text" class="form-control"  name="mat_nm"
														id="mat_nm" value="" placeholder="enter product">
													</div>		
											</div>
											<div class="modal-footer">
												<button type="submit" name="subedit" class="btn btn-primary">Submit</button>
											</div>
										</form>
										</div>
                    </div>
                </div>
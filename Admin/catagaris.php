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
	$cat_name=$_POST['cat_name'];
	$file_name=$_FILES['file_catimg']['name'];
	$file_temp=$_FILES['file_catimg']['tmp_name'];
	$nm=rand().$cat_name;
	$ext=end(explode(".",$file_name));
	$nfile=$nm.".".$ext;
	$file_destination="images/Cat_img/".$nfile;

	if(move_uploaded_file($file_temp,$file_destination))
	{
		$sql1="insert into `categories`(`Cat_name`,`Cat_img`)values('$cat_name','$file_destination')";
		
		$res1=mysqli_query($con,$sql1);
		if($res1)
		{
			header("location:catagaris.php");
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
				<h1 class="mb-3">Course Category</h1>
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
											<h4 class="modal-title">ADD NEW CATEGORY COURSE</h4>
											<button type="button" class="close"  data-dismiss="modal">&times;</button>
										</div>
										<form action="catagaris.php" method="post" enctype="multipart/form-data">
											<div class="modal-body">
												<div class="form-group">
													<label for="exampleInputEmail1">Course Category Name:</label>
													<input type="text" class="form-control" id="txt_catnm" onkeydown="spaceblock()" name="cat_name" placeholder="Enter Category Name" required>
												</div>
												<div class="form-group">
													<label for="imgCat">Course Category Image:</label>
													<input type="file" name="file_catimg" id="imgCat" class="form-control" />
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
	<!-- /.content-header -->


	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					
					<?php
					$sql = "select * from `categories`";
					$res = mysqli_query($con, $sql);
					?>
					<div class="card-body table-responsive p-2">

						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr No.</th>
									<th>Categories</th>
									<th>Image</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($res)) {
								?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['Cat_name']; ?></td>
										<td><img src="<?php echo $row['Cat_img']; ?>" alt="Category Image" height="100px" width="100px" /> </td>
										<td><button class="btn btn-warning"><a style="color:white;" href="catagories_delete.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="color:black"></i></a></button>
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
	function spaceblock() {
		var space = document.getElementById("cat_name");
		if (space.selectionStart === 0 && window.event.code === "Space") {


			window.event.preventDefault();
		}
	}
	function spaceblock1() {
		var space = document.getElementById("cat_slug");
		if (space.selectionStart === 0 && window.event.code === "Space") {


			window.event.preventDefault();
		}
	}
	function spaceblock2() {
		var space = document.getElementById("cat_dis");
		if (space.selectionStart === 0 && window.event.code === "Space") {


			window.event.preventDefault();
		}
	}
	$(document).ready(function() {

		$('.editbtn').click(function() {
			$('#editmodel').modal('show');
			$tr = $(this).closest('tr');

			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			console.log(data);
			$('#cat_name').val(data[1]);
			$('#cat_slug').val(data[2]);
			$('#cat_dis').val(data[3]);

			$('#catid').val(data[0]);
		});
	});
	$(document).on("click", ".openEditMdl", function() {
		var mId = $(this).data('iid');
		$(".card-body #id111").val(mId);

	});
	$(document).on("click", ".openEditMdl", function() {
		var mId = $(this).data('img');
		$(".card-body #oldImg").val(mId);

	});
</script>


<div class="modal fade" id="editmodel" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">EDIT CATEGORIES</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="catagories_edit.php" method="post" enctype="multipart/form-data">
				<div class="card-body">
					<input type="hidden" name="id" id="id111">
					<div class="modal-body">
						<div class="form-group">
							<label for="cata">Category Name:</label>
							<input type="text" class="form-control" id="cat_name" onkeydown="spaceblock3()" name="cat_name" placeholder="Enter Categories" value="">
						</div>
						<div class="form-group">
							<label for="imgCatUpd">Category Image:</label>
							<input type="file" name="updImg" id="imgCatUpd" class="form-control" required/>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" name="sub" class="btn btn-primary">submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function spaceblock3() {
		var space = document.getElementById("cat_name");
		if (space.selectionStart === 0 && window.event.code === "Space") {


			window.event.preventDefault();
		}
	}
	function spaceblock4() {
		var space = document.getElementById("cat_slug");
		if (space.selectionStart === 0 && window.event.code === "Space") {


			window.event.preventDefault();
		}
	}
	function spaceblock5() {
		var space = document.getElementById("cat_dis");
		if (space.selectionStart === 0 && window.event.code === "Space") {


			window.event.preventDefault();
		}
	}

</script>
<?php
include "footer.php";
?>
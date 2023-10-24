<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?php
include "connection.php";

if(!isset($_SESSION['unm'])) {
	header("location:index.php");
}
include "header.php";


?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				<h1 class="mb-3">Contect Details</h1>
					<div class="col-4">
						
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
				
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
						$sql1="select * from `contect`";
						$res=mysqli_query($con,$sql1);
					?>
						<div class="card-body table-responsive p-2">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
									<th>Sr No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Subject</th>
                  <th>Mnumber</th>
									<th>Message</th>
                  <th>Date</th>
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
										<td><?php echo $row['name'];?></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['subject'];?></td>
										<td><?php echo $row['mobileno'];?></td>
										<td><?php echo $row['message'];?></td>
										<td><?php echo $row['date'];?></td>
										<td>
											<button class="btn btn-warning"><a style="color:white;" href="contect_delete.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="color:black"></i></a></button>
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
			
<?php
include "connection.php";


include "header.php";
?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="main.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-4 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                    <?php
                        $sql="select * from `categories`";
                        $res=mysqli_query($con,$sql);
                        $count=mysqli_num_rows($res);
                        ?>
                        <h3><?php echo $count; ?></h3>

                        <p>Categorys</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="catagaris.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                    <?php
                        $sql1="select * from `course`";
                        $res1=mysqli_query($con,$sql1);
                        $count1=mysqli_num_rows($res1);
                        ?>
                        <h3><?php echo $count1; ?></h3>

                        <p>Cources</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="Course.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                    <?php
                        $sql2="select * from `pdf`";
                        $res2=mysqli_query($con,$sql2);
                        $count2=mysqli_num_rows($res2);
                        ?>
                        <h3><?php echo $count2; ?></h3>

                        <p>Matirials</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="Matirials.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

           

        </div>
    </section>
</div>

<?php
include "footer.php";
?>
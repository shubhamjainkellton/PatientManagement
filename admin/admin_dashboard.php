    <?php  include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO PMS
                            <small><?php echo $_SESSION['role']; ?></small>
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin_dashboard.php">Dashboard</a>
                            </li>
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-5 col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-x-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-x-9 text-right">
<?php                        
                        
 $query = "SELECT * FROM users";               
 $select_all_users = mysqli_query($connection, $query);
 $users_counts = mysqli_num_rows($select_all_users);                  
  echo  "<div class='huge'>{$users_counts}</div>";               
 ?>  
                        <div><big>Users</big></div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-5 col-md-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-x-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-x-9 text-right">
 <?php                        
                        
 $query = "SELECT * FROM patients";               
 $select_all_patients = mysqli_query($connection, $query);
 $patient_count = mysqli_num_rows($select_all_patients);                  
  echo  "<div class='huge'>{$patient_count}</div>";               
 ?>
                      <div><big>Patients</big></div>
                    </div>
                </div>
            </div>
            <a href="patients.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    
    <div class="col-lg-5 col-md-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-x-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-x-9 text-right">
  <?php                        
                        
 $query = "SELECT * FROM ward";               
 $select_all_wards = mysqli_query($connection, $query);
 $ward_count = mysqli_num_rows($select_all_wards);                  
  echo  "<div class='huge'>{$ward_count}</div>";               
 ?>                 
                        <div><big> Wards</big></div>
                    </div>
                </div>
            </div>
            <a href="wards.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php  include "includes/admin_footer.php";?>
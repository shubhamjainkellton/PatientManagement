<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php";  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                       <h1 class="page-header">
                            WELCOME TO PMS
                            <small><?php echo $_SESSION['role'] ?></small>
                        </h1>  
                        <?php  
                        
                        if(isset($_GET['source'])){
                         $source = $_GET['source'];   
                        }
                        else{
                            $source='';
                        }
                       switch($source){
                       
                               
                           case 'edit_ward':
                       include "includes/edit_ward.php";
                        break;
                    
                               
                        default:
                        include "includes/view_wards.php"; 
                        break;       
                       }
                        
                        ?>
                        
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
   <?php include "includes/admin_footer.php";  ?>